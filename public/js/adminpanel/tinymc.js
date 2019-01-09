var editor_config = {
  path_absolute : "/",
  selector: "textarea.my-editor",
  setup: function (editor) {
      editor.on('change', function () {
          tinymce.triggerSave();
      });
  },
  plugins: [
    "advlist autolink lists link image charmap print preview hr anchor pagebreak",
    "searchreplace wordcount visualblocks visualchars code fullscreen",
    "insertdatetime media nonbreaking save table contextmenu directionality",
    "emoticons template paste textcolor colorpicker textpattern",
    "advlist autolink lists link image charmap print preview anchor",
    "searchreplace visualblocks code fullscreen",
    "media",
    "table"
  ],
  image_dimensions: false,
   image_class_list: [
      {title: 'Responsive', value: 'img-responsive'}
  ],
  menubar: "table,insert",
  toolbar: "table | insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media| insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image| media",
  relative_urls: false,
  extended_valid_elements: "+iframe[src|width|height|name|align|class]",
  file_browser_callback : function(field_name, url, type, win) {
    var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
    var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

    var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
    if (type == 'image') {
      cmsURL = cmsURL + "&type=Images";
    } else {
      cmsURL = cmsURL + "&type=Files";
    }

    tinyMCE.activeEditor.windowManager.open({
      file : cmsURL,
      title : 'Filemanager',
      width : x * 0.8,
      height : y * 0.8,
      resizable : "yes",
      close_previous : "no"
    });
  }
};

tinymce.init(editor_config);
