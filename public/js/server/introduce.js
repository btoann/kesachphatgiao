import SimpleUploadAdapter from '../../lib/ckeditor5-build-classic/node_modules/@ckeditor/ckeditor5-upload/src/adapters/simpleuploadadapter.js';

ClassicEditor
    .create(document.querySelector('#inputContent'), {
        image: {
            // Configure the available styles.
            styles: [
                'alignLeft', 'alignCenter', 'alignRight'
            ],

            // Configure the available image resize options.
            resizeOptions: [
                {
                    name: 'imageResize:original',
                    label: 'Original',
                    value: null
                },
                {
                    name: 'imageResize:50',
                    label: '50%',
                    value: '50'
                },
                {
                    name: 'imageResize:75',
                    label: '75%',
                    value: '75'

                }
            ],

            // You need to configure the image toolbar, too, so it shows the new style
            // buttons as well as the resize buttons.
            toolbar: [
                'imageStyle:alignLeft', 'imageStyle:alignCenter', 'imageStyle:alignRight',
                '|',
                'imageResize',
                '|',
                'imageTextAlternative'
            ]
        },
        // toolbar: [
        //     'heading', '|',
        //     'alignment', '|',
        //     'bold', 'italic', 'strikethrough', 'underline', 'subscript', 'superscript', '|',
        //     'link', '|',
        //     'bulletedList', 'numberedList', 'todoList', '-',
        //     'fontfamily', 'fontsize', 'fontColor', 'fontBackgroundColor', '|',
        //     'code', 'codeBlock', '|',
        //     'insertTable', '|',
        //     'outdent', 'indent', '|',
        //     'imageUpload', 'blockQuote', '|',
        //     'undo', 'redo'
        // ],

        // ckfinder: {
        //     options: {
        //         resourceType: 'Images'
        //     },
        //     uploadUrl: '../system/lib/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json'
        // },
        simpleUpload: {
            uploadUrl: { url: 'main.php?ctrl=introduce&act=upload&type=image' }
        },
        language: 'vi'
    })
    .then(editor => {
    })
    .catch(error => {
        console.error(error);
    });

