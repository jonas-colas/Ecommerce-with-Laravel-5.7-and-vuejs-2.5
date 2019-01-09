<body style="margin: 0; padding: 0;">

<!-- HEADER -->
<table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <td bgcolor="#EBEBEB">
            <div align="center" style="padding: 0px 15px 0px 15px;">
                <table border="0" cellpadding="0" cellspacing="0" width="580" class="responsive-table">
                    <!-- LOGO/PREHEADER TEXT -->
                    <tr>
                        <td align="center" style="padding: 20px 0 0 0;">
                            <a href="#" target="blank">
                              <img src="images/logo.jpg" width="275" height="100" border="0" alt="EDIT" class="img-max" style="display: block; padding: 0; font-family: Helvetica, Arial, sans-serif; color: #666666; width: 275px; height: 100px;">
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <!-- TOP TICKER -->
                                <tr>
                                    <td style="padding: 20px 0 0 0;" align="center">
                                        <img src="https://gallery.mailchimp.com/c6b1236c909d2d0e1b52e9f8f/images/a150d768-f865-4778-9d16-10ce88d1ee4c.png" width="580" height="6" border="0" alt="EDIT" class="img-max" style="display: block; padding: 0; font-family: Helvetica, Arial, sans-serif; color: #666666; width: 580px; height: 6px;">
                                    </td>
                                </tr>
                                <!-- CONFIRMATION COPY -->
                                <tr>
                                    <td bgcolor="#43515E" style="padding: 50px 0 50px 0;" class="pad-header">
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td align="center" style="font-size: 20px; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: #EBEBEB; font-weight: 300;" class="pad-header-copy">
                                                   Yeay! your order is on its way!!!
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="center" style="font-size: 17px; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: #EBEBEB; font-weight: 300;" class="pad-header-copy">
                                                    Your Order ID:
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="center" style="font-size: 17px; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: #EBEBEB; font-weight: 300;" class="pad-header-copy">
                                                    {{$order->random}}
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
        </td>
    </tr>
</table>

<!-- RESERVATION DETAILS -->
<table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <td bgcolor="#EBEBEB" align="center" style="padding: 0 15px 0 15px;">
            <table border="0" cellpadding="0" cellspacing="0" width="580" class="responsive-table">
                <tr>
                    <td bgcolor="#ffffff">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <!-- DASHED LINE -->
                            <tr>
                                <td style="padding: 10px 30px 30px 30px;">
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td align="center" style="padding: 15px 0 0 0; font-size: 16px; line-height: 1px; font-family: Helvetica, Arial, sans-serif; color: #999999; border-bottom: 1px dashed #999999;" class="padding-copy">
                                                &nbsp;
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <!-- ROOM 1 INFORMATION -->
                            @foreach($order->products as $product)
                            <tr>
                                <td style="padding: 0 30px 8px 30px;">
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td align="left" style="padding: 0 0 15px 0; font-size: 20px; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: #43515E; font-weight: 300; line-height: 22px; text-align: left;">
                                                {{$product->title}}
                                            </td>
                                        </tr>
                                        <!-- CHECK-IN -->
                                        <tr>
                                            <td>
                                                <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                                    <tr>
                                                        <td valign="top" style="padding: 0 0 0px 0;">
                                                            <!-- LEFT COLUMN -->
                                                            <table cellpadding="0" cellspacing="0" border="0" width="26%" align="left" class="responsive-table">
                                                                <tr>
                                                                    <td align="center" style="padding: 0 0 0 0; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: #999999; font-weight: 600; font-size: 12px; line-height: 22px; text-align: left;" bgcolor="#ffffff" class="flex-p-bold">
                                                                        quantity:
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                            <!-- RIGHT COLUMN -->
                                                            <table cellpadding="0" cellspacing="0" border="0" width="70%" align="right" class="responsive-table">
                                                                <tr>
                                                                    <td align="center" style="padding: 0 0 5px 0; font-family: Arial, sans-serif; color: #333333; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: #999999; font-weight: 400; font-size: 12px; line-height: 22px; text-align: left;" bgcolor="#ffffff" class="flex-p">
                                                                      {{$product->pivot->quantity}}
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <!-- PREFERENCES -->
                                        <tr>
                                            <td>
                                                <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                                    <tr>
                                                        <td valign="top" style="padding: 0 0 5px 0;">
                                                            <!-- LEFT COLUMN -->
                                                            <table cellpadding="0" cellspacing="0" border="0" width="26%" align="left" class="responsive-table">
                                                                <tr>
                                                                    <td align="center" style="padding: 0 0 0 0; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: #999999; font-weight: 600; font-size: 12px; line-height: 22px; text-align: left;" bgcolor="#ffffff" class="flex-p-bold">
                                                                        Price:
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                            <!-- RIGHT COLUMN -->
                                                            <table cellpadding="0" cellspacing="0" border="0" width="70%" align="right" class="responsive-table">
                                                                <tr>
                                                                    <td align="center" style="padding: 0 0 0 0; font-family: Arial, sans-serif; color: #333333; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: #999999; font-weight: 400; font-size: 12px; line-height: 22px; text-align: left;" bgcolor="#ffffff" class="flex-p">
                                                                        {{$product->price}}
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <!-- ROOM DETAILS -->
                                        <tr>
                                            <td>
                                                <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                                    <tr>
                                                        <td valign="top" style="padding: 5px 0 0 0;">
                                                            <!-- LEFT COLUMN -->
                                                            <table cellpadding="0" cellspacing="0" border="0" width="26%" align="left" class="responsive-table">
                                                                <tr>
                                                                    <td align="center" style="padding: 0 0 0 0; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: #999999; font-weight: 600; font-size: 12px; line-height: 22px; text-align: left;" bgcolor="#ffffff" class="flex-p-bold">
                                                                        product image:
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                            <!-- RIGHT COLUMN -->
                                                            <table cellpadding="0" cellspacing="0" border="0" width="70%" align="right" class="responsive-table">
                                                                <tr>
                                                                    <td align="center" style="padding: 0 0 0 0; font-family: Arial, sans-serif; color: #333333; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: #999999; font-weight: 400; font-size: 12px; line-height: 22px; text-align: left;" bgcolor="#ffffff" class="flex-p">
                                                                      <img src="/storage/product_feature_images/{{$product->featureimage->featureimage}}" alt="" width="100px"; height:="100px">
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            @endforeach
                            <!-- DASHED LINE -->
                            <tr>
                                <td style="padding: 10px 30px 30px 30px;">
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td align="center" style="padding: 15px 0 0 0; font-size: 16px; line-height: 1px; font-family: Helvetica, Arial, sans-serif; color: #999999; border-bottom: 1px dashed #999999;" class="padding-copy">
                                                &nbsp;
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>

                            <!-- ROOM CHARGES -->
                            <tr>
                                <td style="padding: 0 30px 0 30px;">
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td align="left" style="padding: 0 0 15px 0; font-size: 20px; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: #43515E; font-weight: 300; line-height: 22px; text-align: left;">
                                                Total Charges
                                            </td>
                                        </tr>
                                        <!-- ROOM 2 -->
                                        <tr>
                                            <td>
                                                <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                                    <!-- ROOM CHARGES -->
                                                    <tr>
                                                        <td>
                                                            <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                                                <tr>
                                                                    <td valign="top" style="padding: 0 0 15px 0;">
                                                                        <!-- LEFT COLUMN -->
                                                                        <table cellpadding="0" cellspacing="0" border="0" width="67%" align="left" class="responsive-table">
                                                                            <tr>
                                                                                <td align="center" style="padding: 0 0 0 0; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: #999999; font-weight: 600; font-size: 12px; line-height: 22px; text-align: left;" bgcolor="#ffffff" class="flex-p-desc_charges">
                                                                                    Subtotal:
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                        <!-- RIGHT COLUMN -->
                                                                        <table cellpadding="0" cellspacing="0" border="0" width="30%" align="right" class="responsive-table">
                                                                            <tr>
                                                                                <td align="center" style="padding: 0 0 0 0; font-family: Arial, sans-serif; color: #333333; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: #999999; font-weight: 600; font-size: 12px; line-height: 22px; text-align: right;" bgcolor="#ffffff" class="flex-p-promotax">
                                                                                    ${{$order->billing_subtotal}}
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td valign="top" style="padding: 0 0 15px 0;">
                                                                        <!-- LEFT COLUMN -->
                                                                        <table cellpadding="0" cellspacing="0" border="0" width="67%" align="left" class="responsive-table">
                                                                            <tr>
                                                                                <td align="center" style="padding: 0 0 0 0; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: #999999; font-weight: 600; font-size: 12px; line-height: 22px; text-align: left;" bgcolor="#ffffff" class="flex-p-desc_charges">
                                                                                    Tax:
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                        <!-- RIGHT COLUMN -->
                                                                        <table cellpadding="0" cellspacing="0" border="0" width="30%" align="right" class="responsive-table">
                                                                            <tr>
                                                                                <td align="center" style="padding: 0 0 0 0; font-family: Arial, sans-serif; color: #333333; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: #999999; font-weight: 600; font-size: 12px; line-height: 22px; text-align: right;" bgcolor="#ffffff" class="flex-p-promotax">
                                                                                    ${{$order->billing_tax}}
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <!-- TOTAL -->
                                        <tr>
                                            <td align="right" style="padding: 0 0 0 0; font-size: 36px; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: #00b1b1; font-weight: 100;" class="align-total-charge">
                                                ${{$order->bolling_total}}
                                            </td>
                                        </tr>
                                        <!-- TOTAL TITLE -->
                                        <tr>
                                            <td align="right" style="font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: #999999; font-weight: 600; font-size: 12px; line-height: 22px;" class="align-total-charge">
                                                Total (including tax recovery charges and service fees)
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <!-- DASHED LINE -->
                            <tr>
                                <td style="padding: 10px 30px 30px 30px;">
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td align="center" style="padding: 15px 0 0 0; font-size: 16px; line-height: 1px; font-family: Helvetica, Arial, sans-serif; color: #999999; border-bottom: 1px dashed #999999;" class="padding-copy">
                                                &nbsp;
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>

<!-- ADDITIONAL INFORMATION -->
<table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <td bgcolor="#EBEBEB" align="center" style="padding: 0 15px 0 15px;">
            <table border="0" cellpadding="0" cellspacing="0" width="580" class="responsive-table">
                <tr>
                    <td bgcolor="#ffffff" style="padding: 0 0 30px 0; border-top: 4px solid #ebebeb;">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td style="padding: 30px 30px 0 30px;">
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <!-- EXTRA HOTEL INFO -->
                                        <tr>
                                            <td align="left" style="padding: 0 0 15px 0; font-size: 20px; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: #43515E; font-weight: 300; line-height: 22px; text-align: left;">
                                                Additional Information
                                            </td>
                                        </tr>
                                        <!-- CHECK IN -->
                                        <tr>
                                            <td align="left" style="font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: #999999; font-weight: 600; font-size: 12px; line-height: 22px;" >
                                                Address that this order will be shipped to:
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="left" style="padding: 0 0 3px 0; font-size: 11px; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: #999999; font-weight: 400;" >
                                              {{$order->billing_address}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="left" style="font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: #999999; font-weight: 600; font-size: 12px; line-height: 22px;" >
                                                Phone number:
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="left" style="padding: 0 0 3px 0; font-size: 11px; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: #999999; font-weight: 400;" >
                                              {{$order->billing_phone}}
                                            </td>
                                        </tr>

                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <!-- BOTTOM TICKER -->
                <tr>
                    <td style="padding: 0 0 0 0;" align="center">
                        <img src="https://gallery.mailchimp.com/c6b1236c909d2d0e1b52e9f8f/images/b1dca63c-f6a5-454a-a733-bfb5a95f7f1f.png" width="580" height="6" border="0" alt="EDIT" class="img-max" style="display: block; padding: 0; font-family: Helvetica, Arial, sans-serif; color: #666666; width: 580px; height: 6px;">
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>

</body>
