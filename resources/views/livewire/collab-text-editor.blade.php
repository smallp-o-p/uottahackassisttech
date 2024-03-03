<div class="w-full mt-8 mx-8 rounded-lg">
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

    <h1 class="text-bold text-3xl text-center mb-4">Share this code for others to view: {{ $random }}</h1>

    <div {{ $permission ? '' : 'disabled' }} id="quill-editor" class="mb-3 mx-8" style="height: 300px;"></div>
    <textarea rows="3" class="mb-3 d-none" name="job_description" id="quill-editor-area"></textarea>
    <div>
        <button type="button" wire:click="test"> test</button>
    </div>

</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        let permissionToEdit = {{ $permission }};
        console.log(permissionToEdit);
        if (!permissionToEdit) {
            window.client.subscribe("doc-{{ $random }}", function(err) {
                console.log("subscribed to doc-{{ $random }}");
            });
        }
        if (document.getElementById('quill-editor-area')) {
            var editor = new Quill('#quill-editor', {
                theme: 'snow'
            });
            var quillEditor = document.getElementById('quill-editor-area');
            editor.on('text-change', function() {
                quillEditor.value = editor.root.innerHTML;
                console.log(quillEditor.value);
                if (permissionToEdit == true) {
                    window.client.publish('doc-{{ $random }}', quillEditor.value);
                } else {
                    console.log('cannot publish');
                }
            });

            quillEditor.addEventListener('input', function() {
                editor.root.innerHTML = quillEditor.value;
            });

            window.client.on('message', function(topic, payload, packet) {
                console.log(payload);
                editor.root.innerHTML = payload;
                setTimeout(() => editor.setSelection(payload.length, 0), 0)
            });
        }
    });
</script>
