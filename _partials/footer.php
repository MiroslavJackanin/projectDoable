<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="_assets/app.js"></script>

    <footer>
        <nav class="footer navbar-expand-md navbar-dark bg-dark justify-content-around">
            <div>
                <p>Made by students of IT Academy SOVY in Košice, 2019</p>
                <p>Peter Ganóczi, Miroslav Jackanin, Denis Németh, Nikoleta Petrová</p>
            </div>
        </nav>
    </footer>

<script>
    let scrollUpBtn = document.getElementById("scroll-up");

    window.onscroll = function(){
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20){
            scrollUpBtn.style.display = "block";
        } else {
            scrollUpBtn.style.display = "none";
        }
    };

    scrollUpBtn.onclick = function(){
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    };
</script>
</body>

</html>