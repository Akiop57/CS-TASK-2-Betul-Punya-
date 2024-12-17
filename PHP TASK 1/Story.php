<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Magic Door Adventure</title>
    <style>
        body {
            font-family: 'Times New Roman', serif;
            text-align: center;
            background-color: #1e1e2e;
            margin: 0;
            padding: 0;
            color: #ddd;
        }
        h1 {
            color: #ffd700;
            font-size: 3rem;
            margin-top: 20px;
        }
        p {
            font-size: 1.2rem;
            margin-top: 10px;
            color: gray
        }
        .door-container {
            display: flex;
            justify-content: center;
            gap: 30px;
            margin-top: 50px;
        }
        .door {
            width: 160px;
            height: 240px;
            background: linear-gradient(145deg, #3a2e4f, #6b5a8d);
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            font-weight: bold;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.6);
            cursor: pointer;
            border: 5px ridge #8b7dd6;
            border-radius: 10px;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.6);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .door:hover {
            transform: translateY(-10px);
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.9);
            background: linear-gradient(145deg, #5a4489, #8e79c4);
        }
        #result {
            margin-top: 30px;
            font-size: 1.8rem;
            color: #ffd700;
        }
        #next-doors, #door2-continuation, #door3-continuation {
            display: none;
            margin-top: 50px;
        }
        /* Background styles */
        body.crystal-cave {
            background: url('https://img.freepik.com/premium-vector/crystal-cave-vector-3_996668-197.jpg') no-repeat center center fixed;
            background-size: cover;
        }
        body.faint-light {
            background: url('https://img.freepik.com/premium-photo/faint-light-forest-digital-horror-story-about-ligh_938522-2683.jpg') no-repeat center center fixed;
            background-size: cover;
        }
        body.treasure-chest {
            background: url('https://th.bing.com/th/id/OIP.GRUgHl_8EoGpCFzrOGHdLQHaD7?rs=1&pid=ImgDetMain') no-repeat center center fixed;
            background-size: cover;
        }
    </style>
</head>
<body id="main-body">
    <h1>Magic Door Adventure</h1>
    <p>Choose a door to see what lies behind...</p>
    
    <div class="door-container" id="initial-doors">
        <div class="door" onclick="chooseDoor(1)">Door 1</div>
        <div class="door" onclick="chooseDoor(2)">Door 2</div>
        <div class="door" onclick="chooseDoor(3)">Door 3</div>
    </div>
    
    <div id="result"></div>

    <div class="door-container" id="next-doors">
        <div class="door" onclick="chooseNextDoor(4)">Door 4</div>
        <div class="door" onclick="chooseNextDoor(5)">Door 5</div>
    </div>

    <div class="door-container" id="door2-continuation">
        <div class="door" onclick="chooseDoor2Path(8)">Light Ahead</div>
        <div class="door" onclick="chooseDoor2Path(9)">Shadowy Figure</div>
    </div>

    <div class="door-container" id="door3-continuation">
        <div class="door" onclick="chooseDoor3Path(10)">Open Chest</div>
        <div class="door" onclick="chooseDoor3Path(11)">Mystical Key</div>
    </div>

    <script>
        function chooseDoor(door) {
            let result = document.getElementById('result');
            let initialDoors = document.getElementById('initial-doors');
            let nextDoors = document.getElementById('next-doors');
            let door2Continuation = document.getElementById('door2-continuation');
            let door3Continuation = document.getElementById('door3-continuation');
            let body = document.getElementById('main-body');
            
            switch(door) {
                case 1:
                    result.innerHTML = "You enter a crystal cave! Two more doors appear...";
                    initialDoors.style.display = 'none';
                    nextDoors.style.display = 'flex';
                    body.className = 'crystal-cave';
                    break;
                case 2:
                    result.innerHTML = "You step into darkness and see a faint light ahead...";
                    initialDoors.style.display = 'none';
                    door2Continuation.style.display = 'flex';
                    body.className = 'faint-light';
                    break;
                case 3:
                    result.innerHTML = "You find a glowing treasure chest! But there's more...";
                    initialDoors.style.display = 'none';
                    door3Continuation.style.display = 'flex';
                    body.className = 'treasure-chest';
                    break;
                default:
                    result.innerHTML = "Something strange happens... Try again.";
            }
        }

        function chooseNextDoor(door) {
            let result = document.getElementById('result');
            switch(door) {
                case 4:
                    result.innerHTML = "The icy door freezes you in place! Game over... but you wake up back at the start.";
                    resetGame();
                    break;
                case 5:
                    result.innerHTML = "The wooden door reveals a peaceful forest where you rest and find inner peace. You win!";
                    resetGame();
                    break;
                default:
                    result.innerHTML = "Something strange happens... Try again.";
            }
        }

        function chooseDoor2Path(option) {
            let result = document.getElementById('result');
            switch(option) {
                case 8:
                    result.innerHTML = "The light reveals a beautiful garden full of singing birds. You win peace!";
                    resetGame();
                    break;
                case 9:
                    result.innerHTML = "The shadowy figure approaches... It's a friendly wizard who guides you to safety! You win wisdom!";
                    resetGame();
                    break;
                default:
                    result.innerHTML = "Something mysterious happens...";
            }
        }

        function chooseDoor3Path(option) {
            let result = document.getElementById('result');
            switch(option) {
                case 10:
                    result.innerHTML = "Inside the chest is endless gold! You are now rich beyond imagination!";
                    resetGame();
                    break;
                case 11:
                    result.innerHTML = "You take the mystical key... It unlocks a hidden portal to a magical world. Adventure awaits!";
                    resetGame();
                    break;
                default:
                    result.innerHTML = "Something mysterious happens...";
            }
        }

        function resetGame() {
            setTimeout(() => {
                document.getElementById('result').innerHTML = "Choose a door to see what lies behind...";
                document.getElementById('initial-doors').style.display = 'flex';
                document.getElementById('next-doors').style.display = 'none';
                document.getElementById('door2-continuation').style.display = 'none';
                document.getElementById('door3-continuation').style.display = 'none';
                document.getElementById('main-body').className = '';
            }, 4000);
        }
    </script>
</body>
</html>
