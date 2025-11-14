<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Box</title>
    <style>
        /* Styling for the search box */
        .search-box {
            width: 200px;
            overflow: hidden;
            transition: width 0.3s ease;
        }

        .search-box.expanded {
            width: 300px;
        }

        .search-input {
            width: 100%;
            box-sizing: border-box;
            padding: 5px;
        }
        .img {
            height: 40px;
            width: 40px;
        }
    </style>
</head>
<body>
<div class="search-box" id="searchBox">
    <label>
        <input type="text" class="search-input" placeholder="Search...">
    </label>
</div>
<img src="{{ asset('./pics/magnifier.png') }}" alt="Search" onclick="expandSearchBox()">

<script>
    function expandSearchBox() {
        const searchBox = document.getElementById("searchBox");
        searchBox.classList.toggle("expanded");
        // Focus on the input field when expanding
        if (searchBox.classList.contains("expanded")) {
            searchBox.querySelector('.search-input').focus();
        }
    }
</script>
</body>
</html>
