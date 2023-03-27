<?php
$videoFile = isset($_GET['videoFile']) ? $_GET['videoFile'] : null;
$audioFile = isset($_GET['audioFile']) ? $_GET['audioFile'] : null;
$imgFile = isset($_GET['imgFile']) ? $_GET['imgFile'] : null;

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
        <source id="videoPlayerSource" src="<?php echo htmlspecialchars($videoFile); ?>" type="video/mp4">
    </video><br/><br/>
    <button id="videoCancel" onclick="cancelVideo()">Anuluj odtwarzanie wideo</button><br/><br/>
<?php endif; ?>

<?php if ($audioFile): ?>
    <audio id="audioPlayer" controls>
        <source id="audioPlayerSource" src="<?php echo htmlspecialchars($audioFile); ?>" type="audio/mpeg">
    </audio><br/><br/>
    <button id="audioCancel" onclick="cancelAudio()">Anuluj odtwarzanie dźwięku</button><br/><br/>
<?php endif; ?>

</body>
</html>
