<?php
namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Product;
/**
 * Class UserApiController
 * @package App\Http\Controllers\API
 */
class UserApiController extends Controller
{
    /**
     * @var User
     */
    private $user;
    /**
     * UserApiController constructor.
     * @param User $user
     */
    public function __construct(Product $product)
    {
    	$this->product = $product;
    }
    /**
     * return paginated records of users
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
    	$products = $this->product->with('featureimage')->when(request()->categoryname, function ($query) {
          $query->whereHas('categories', function ($query) {
              $query->whereIn('name', request()->categoryname);
          });
        })->when(request()->resolution, function ($query) {
              return $query->whereIn('resolution', request()->resolution);
        })->when(request()->model_year, function ($query) {
              return $query->whereIn('model_year', request()->model_year);
        })->when(request()->screen_size, function ($query) {
              return $query->whereIn('screen_size', request()->screen_size);
        })->when(request()->q, function ($query) {
              return $query->where('title', 'like' , '%' .request()->q. '%');
        })->when(request()->selected, function ($query) {
            if(request()->selected === 'Price: low to high'){
              return $query->orderBy('price');
            }elseif(request()->selected === 'Price: high to low'){
              return $query->orderBy('price', 'desc');
            }elseif(request()->selected === 'Popularity'){
              return $query->orderBy('rate', 'desc');
            }
        })->paginate(2);

    	return response()->json($products);
    }
}
