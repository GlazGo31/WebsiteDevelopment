<script>
    function getLoadingPercent()
    {
        let images = document.getElementsByTagName("img");

        let image_count = images.length;

        let image_array = images;

        let loadedCount = 0;

        for (let i = 0; i < image_count; i++) {
            if (!image_array[i].complete) continue;
            loadedCount++;
        }

        return 100 * loadedCount / image_count
    }

    let interval = setInterval(() => {
        let percent = getLoadingPercent()

        if(percent >= 100 && window.startHeaderAnimation) {
            clearInterval(interval)
            document.querySelector('.preloader').classList.remove('show')

            window.startHeaderAnimation()
        }

        document.querySelector('.loaded').style.width = `${percent}%`
        document.querySelector('.percent').innerText = percent.toFixed(0)
    }, 200)

</script>

<div class="preloader show">

    <div class="loading">
        <div class="loaded"></div>
    </div>

    <div class="image">
        <img src="/images/loading.png" />
    </div>

    <div class="percent">00</div>

    <div class="footer">
        <div class="slogan">SkyCode - симбиоз воображения<br> и технического совершенства.</div>
        <div class="agency">Digital Agency 2022</div>
    </div>

</div>
