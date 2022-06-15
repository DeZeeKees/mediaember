<?php
    html("../media/img/favicon.ico");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../script/index.js" defer></script>
    <title>Document</title>
</head>
<body id="gameContainer" onload=onloadHypersonic()>
    
</body>
</html>

<script>
const gameState = {}

function preload() {
    this.load.image('Player', './media/img/hypersonic gal transparent.png')
}

function create() {
    gameState.player = this.add.sprite(200, 200, 'Player')
    gameState.keys = this.input.keyboard.createCursorKeys()
}

function update() {
    if (gameState.keys.left.isDown) {
        gameState.player.x -=4
    }
    else if (gameState.keys.left.isDown && gameState.keys.shift.isDown) {
        gameState.player.x -=6
    }
    if (gameState.keys.right.isDown) {
        gameState.player.x +=4
    }
    else if (gameState.keys.right.isDown && gameState.keys.shift.isDown) {
        gameState.player.x -=6
    }
    if (gameState.keys.up.isDown) {
        gameState.player.y -=4
    }
    else if (gameState.keys.up.isDown && gameState.keys.shift.isDown) {
        gameState.player.x -=6
    }
    if (gameState.keys.down.isDown) {
        gameState.player.y +=4
    }
    else if (gameState.keys.down.isDown && gameState.keys.shift.isDown) {
        gameState.player.x -=6
    }
}
    const config = {
        type: Phaser.AUTO,
        width: 1400,
        height: 1000,
        parent: document.querySelector('#gameContainer'),
        scene: {
            preload,
            create,
            update
        }   
    }

const game = new Phaser.Game(config)

</script>