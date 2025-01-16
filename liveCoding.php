<link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
<script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>
<?php
function projectView() {
    $connect = new PDO("mysql:host=localhost;dbname=livecoding", "root", "");
    $stmt = $connect->prepare("SELECT * FROM md;");
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
$proj = projectView();
if (empty($proj["description"])) {
    echo '<form action="./post.php" method="post">
                <input type="hidden" id="jsonMarkdown" name="description">
                <input type="submit" value="Save">
            </form>
            <textarea id="editor"></textarea>';
} else {
    echo '<div id="preview" style="border: 1px solid #000; padding: 1rem;"></div>';
}
?>
<script src="script.js"></script>
<script>
    const projectDescription = <?php echo json_encode($proj["description"]); ?>;
    document.getElementById("preview").innerHTML = simplemde.markdown(JSON.parse(projectDescription));
</script>