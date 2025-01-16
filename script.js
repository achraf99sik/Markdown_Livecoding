const markdown = document.getElementById("editor");
const simplemde = new SimpleMDE({ 
    element: markdown,
    placeholder: "Write your Description here..."
});
function updatePreview() {
    const desc = document.getElementById("jsonMarkdown");
    desc.value = JSON.stringify(simplemde.value());
}
simplemde.codemirror.on("change", updatePreview);