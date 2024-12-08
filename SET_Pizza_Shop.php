<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Save User Name</title>
    <style>
        body {
            text-align: center;
        }
        input, button {
            margin: 10px;
            padding: 10px;
        }
        .hidden {
            display: none; /* Hide elements by default */
        }
    </style>
</head>
<body>
    <h1 id="mainHeading">Please enter your name</h1>
    <div id="userForm">
        <form onsubmit="UserNameSelection(event);">
            <input type="text" id="userName" placeholder="Enter your name" />
            <button type="submit">Submit</button>
        </form>
        <p id="errorMessage" style="color: red;"></p>
    </div>
    <div id="numberPromptSection" class="hidden">
        <p>Welcome! Now, please proceed with the next step.</p>
    </div>

    <script>
        function UserNameSelection(event) {
            event.preventDefault(); // Prevent form submission
            const userName = document.getElementById('userName').value.trim();
            const errorMessage = document.getElementById('errorMessage');

            // this clears previous messages
            errorMessage.innerText = "";
            
            // this checks if the name is empty
            if (userName === "") {
                errorMessage.innerText = "Error: Please enter your name.";
                return;
            }

            // and this check if the name contains any numbers
            if (/\d/.test(userName)) { 
                errorMessage.innerText = "Error: Your name cannot contain numbers.";
                return;
            }

            // this saves the name of the user
            localStorage.setItem('name', userName);

            // Display a welcome message and proceed (this is just for now)
            document.getElementById('mainHeading').innerText = "Welcome, " + userName + "!";
            document.getElementById('numberPromptSection').classList.remove('hidden'); // Show next section
            document.getElementById('userForm').classList.add('hidden'); // Hide the name form
        }
    </script>
</body>
</html>
