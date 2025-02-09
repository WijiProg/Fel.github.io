<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yes or No</title>
    <style>
      body {
            font-family: 'Poppins', sans-serif;
            text-align: center;
            background: linear-gradient(to right, #ff9a9e, #fad0c4);
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            position: relative;
        }
        .container {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 40px;
            margin-top: 20px;
            width: 100%;
            height: 200px;
        }
        .btn {
            padding: 12px 24px;
            font-size: 20px;
            cursor: pointer;
            border: none;
            border-radius: 25px;
            transition: all 0.3s ease;
            font-weight: bold;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }
        #yes {
            background-color: #28a745;
            color: white;
        }
        #yes:hover {
            background-color: #218838;
        }
        #no {
            background-color: #dc3545;
            color: white;
            position: relative;
        }
        #no:hover {
            background-color: #c82333;
        }
        h2 {
            font-size: 28px;
            color: #fff;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
        }
        #message {
            display: none;
            font-size: 24px;
            color: #fff;
            font-weight: bold;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
            margin-top: 20px;
        }
        #hint {
            display: none;
            font-size: 18px;
            color: blue;
            font-weight: bold;
            position: absolute;
            top: -30px;
            left: 50%;
            transform: translateX(-50%);
        }
    </style>
</head>
<body>
    <h2 id="question">Fel sugdan tana?</h2>
    <div class="container">
        <button id="yes" class="btn" onclick="showMessage()">Yes</button>
        <div style="position: relative; display: inline-block;">
            <span id="hint"></span>
            <button id="no" class="btn" onclick="moveButton()">No</button>
        </div>
    </div>
    <p id="message"></p>

    <script>
        let noClickCount = 0;

        function showMessage() {
            document.getElementById("question").innerText = "Yay! You made the right choice!";
            document.getElementById("yes").style.display = "none";
            document.getElementById("no").style.display = "none";
            document.getElementById("message").style.display = "block";
            document.getElementById("hint").style.display = "none";
        }
        
        function moveButton() {
            let button = document.getElementById("no");
            let hint = document.getElementById("hint");
            noClickCount++;
            
            if (noClickCount % 2 === 0) {
                hint.innerText = "Oopss?";
            } else {
                hint.innerText = "Hmmm?";
            }
            hint.style.display = "block";
            hint.style.top = button.offsetTop - 30 + "px";
            hint.style.left = button.offsetLeft + "px";
            
            let container = document.querySelector(".container");
            let rect = container.getBoundingClientRect();
            let maxX = rect.width - 80;
            let maxY = rect.height - 80;
            let moveDistance = 96; // 1 inch (96 pixels)
            
            let newX = button.offsetLeft + (Math.random() < 0.5 ? -moveDistance : moveDistance);
            let newY = button.offsetTop + (Math.random() < 0.5 ? -moveDistance : moveDistance);
            
            newX = Math.max(0, Math.min(newX, maxX));
            newY = Math.max(0, Math.min(newY, maxY));
            
            button.style.left = newX + "px";
            button.style.top = newY + "px";
        }
    </script>
</body>
</html>