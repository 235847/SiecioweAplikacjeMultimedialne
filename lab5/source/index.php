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
    <style>
        .removeRowButton {
            cursor: pointer;
            background-color: red;
            color: white;
            border: none;
            padding: 5px 10px;
            text-align: center;
            font-size: 14px;
            margin: 4px 2px;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<?php if ($videoFile): ?>
    <video id="videoPlayer" src="<?php echo htmlspecialchars($videoFile); ?>" controls>
        <source id="videoPlayerSource" src="<?php echo htmlspecialchars($videoFile); ?>" type="video/mp4">
    </video><br/><br/>
    <button id="videoCancel" onclick="cancelVideo()">Anuluj odtwarzanie wideo</button>
    <button id="videoAdd" onclick="addMedia('videoPlayer', 'Video')">Dodaj video</button><br/><br/>
<?php endif; ?>

<?php if ($audioFile): ?>
    <audio id="audioPlayer" src="<?php echo htmlspecialchars($audioFile); ?>" controls>
        <source id="audioPlayerSource" src="<?php echo htmlspecialchars($audioFile); ?>" type="audio/mpeg">
    </audio><br/><br/>
    <button id="audioCancel" onclick="cancelAudio()">Anuluj odtwarzanie dźwięku</button>
    <button id="audioAdd" onclick="addMedia('audioPlayer', 'Audio')">Dodaj dżwięk</button><br/><br/>
<?php endif; ?>

<?php if ($imgFile): ?>
    <img id="posterImage" src="<?php echo htmlspecialchars($imgFile); ?>" alt="Obraz">
    <button id="imgCancel" onclick="cancelImg()">Anuluj obraz</button>
    <button id="imgAdd" onclick="addMedia('posterImage', 'Image')">Dodaj obraz</button><br/><br/>
<?php endif; ?>

<table id="playlist_table">
    <tr>
        <th>No.</th>
        <th>URL</th>
        <th>Type</th>
        <th>Action</th>
    </tr>
</table>

<script>

    function cancelVideo() {
        document.getElementById("videoPlayer").src = "cancel.mp4";
        document.getElementById("videoPlayerSource").src = "cancel.mp4";
    }

    function cancelAudio() {
        document.getElementById("audioPlayer").src = "cancel.mp3";
        document.getElementById("audioPlayerSource").src = "cancel.mp4";
    }

    function cancelImg() {
        document.getElementById("posterImage").src = "cancel.jpg";
    }

    function addMedia(playerId, mediaType) {
        const player = document.getElementById(playerId);
        const src = player.getAttribute('src');
        const table = document.getElementById('playlist_table');
        const newRow = table.insertRow(-1);
        const cell1 = newRow.insertCell(0);
        const cell2 = newRow.insertCell(1);
        const cell3 = newRow.insertCell(2);
        const cell4 = newRow.insertCell(3);

        cell1.innerHTML = table.rows.length - 1;
        cell2.innerHTML = src;
        cell3.innerHTML = mediaType;
        cell4.innerHTML = `<button class="removeRowButton" onclick="deleteRow(this)">Delete</button>`;
    }

    function deleteRow(button) {
        const row = button.parentNode.parentNode;
        const table = row.parentNode;
        table.removeChild(row);

        for (let i = 1; i < table.rows.length; i++) {
            table.rows[i].cells[0].innerHTML = i;
        }
    }
</script>