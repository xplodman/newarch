<input type="text" id="yourText" disabled />
<input type="checkbox" id="yourBox" />

<script>
    document.getElementById('yourBox').onchange = function() {
        document.getElementById('yourText').disabled = !this.checked;
    };
</script>