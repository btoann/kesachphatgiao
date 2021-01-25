ClassicEditor
    .create( document.querySelector('#inputContent'), {
        toolbar: [
                'heading', '|',
                'alignment', '|',
                'bold', 'italic', 'strikethrough', 'underline', 'subscript', 'superscript', '|',
                'link', '|',
                'bulletedList', 'numberedList', 'todoList', '-',
                'fontfamily', 'fontsize', 'fontColor', 'fontBackgroundColor', '|',
                'code', 'codeBlock', '|',
                'insertTable', '|',
                'outdent', 'indent', '|',
                'imageUpload', 'blockQuote', '|',
                'undo', 'redo'
            ],
        ckfinder: {
            options: {
                resourceType: 'Images'
            },
            uploadUrl: '../system/lib/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json'
        },
        language: 'vi'
    } )
    .then( editor => {
    } )
    .catch( error => {
        console.error( error );
    } );