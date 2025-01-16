let markdown = document.getElementById("editor");

if (markdown) {
    let simplemde = new SimpleMDE({
        element: markdown,
        placeholder: 'Write your description',
    });

    function updatePreview() {
        const desc = document.getElementById("jsonMarkdown");
        if (desc) {
            desc.value = JSON.stringify(simplemde.value());
        }
    }

    simplemde.codemirror.on("change", updatePreview);
} else {
    console.error("Element with id 'editor' not found.");
}
