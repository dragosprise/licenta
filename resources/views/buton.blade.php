<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkbox Example</title>
    <style>
        .icon {
            cursor: pointer;
            font-size: 24px;
            padding: 10px;
        }
        .hidden {
            display: none;
        }
    </style>
</head>
<body>
<div>
    <input type="checkbox" id="toggleCheckbox" style="display: none;">
    <label for="toggleCheckbox" class="icon">&#10007;</label> <!-- Cross initially -->
</div>

<script>
    document.getElementById('toggleCheckbox').addEventListener('change', function() {
        var label = document.querySelector('label[for="toggleCheckbox"]');
        if (this.checked) {
            label.innerHTML = '&#10003;'; // Change to checkmark
        } else {
            label.innerHTML = '&#10007;'; // Change to cross
        }
    });
</script>
</body>
</html>
