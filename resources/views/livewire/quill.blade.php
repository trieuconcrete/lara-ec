<div>
    <!-- Include stylesheet -->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

    <!-- Create the editor container -->
    <div id="{{ $quillId }}" wire:ignore style="height: 240px;">{!! $value !!}</div>
    <input type="hidden" name="quill-contents" id="quill-contents" value="{{ $value }}">

    <!-- Include the Quill library -->
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

    <!-- Initialize Quill editor -->
    <script>
        var toolbarOptions = [
            ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
            ['blockquote', 'code-block'],

            [{ 'header': 1 }, { 'header': 2 }],               // custom button values
            [{ 'list': 'ordered'}, { 'list': 'bullet' }],
            [{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
            [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
            [{ 'direction': 'rtl' }],                         // text direction

            [{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
            [{ 'header': [1, 2, 3, 4, 5, 6, false] }],

            [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
            [{ 'font': [] }],
            [{ 'align': [] }],

            ['link', 'image'],

            ['clean']                                         // remove formatting button
        ];

        const quill = new Quill('#{{ $quillId }}', {
            theme: 'snow',
            modules: {
                toolbar: toolbarOptions
            }
        });

        quill.on('text-change', function (delta, source) {
            updateHtmlOutput();
        })

        // Return the HTML content of the editor
        function getQuillHtml() { return quill.root.innerHTML; }

        function updateHtmlOutput()
        {
            let html = getQuillHtml();
            $('#quill-contents').val( html )
        }
    </script>

</div>