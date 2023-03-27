<?php
$videoFile = isset($_GET['videoFile']) ? $_GET['videoFile'] : null;
$audioFile = isset($_GET['audioFile']) ? $_GET['audioFile'] : null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello World Player</title>
</head>
<body>

<?php if ($videoFile): ?>
    <video id="videoPlayer" controls>
        <source src="<?php echo htmlspecialchars($videoFile); ?>" type="video/mp4">
        Your browser does not support the video tag.
    </video>
<?php endif; ?>

<?php if ($audioFile): ?>
    <audio id="audioPlayer" controls>
        <source src="<?php echo htmlspecialchars($audioFile); ?>" type="audio/mpeg">
        Your browser does not support the audio tag.
    </audio>
<?php endif; ?>

</body>
</html>
