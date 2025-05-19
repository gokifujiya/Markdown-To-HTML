<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Markdown to HTML Converter</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/monaco-editor/0.20.0/min/vs/loader.min.js"></script>
</head>
<body>
    <form action="convert.php" method="POST">
        <div id="editor-container" style="width:800px;height:300px;border:1px solid #ccc;"></div>
        <input type="hidden" name="markdown" id="markdown">
        <select name="action">
            <option value="display">Display HTML</option>
            <option value="download">Download HTML</option>
        </select>
        <button type="submit" onclick="syncEditor()">Convert</button>
    </form>

    <script>
        require.config({ paths: { 'vs': 'https://cdnjs.cloudflare.com/ajax/libs/monaco-editor/0.20.0/min/vs' }});
        require(['vs/editor/editor.main'], function() {
            window.editor = monaco.editor.create(document.getElementById('editor-container'), {
                value: '# Hello, Markdown!',
                language: 'markdown'
            });
        });

        function syncEditor() {
            document.getElementById('markdown').value = window.editor.getValue();
        }
    </script>
</body>
</html>
