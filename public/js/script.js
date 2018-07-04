document.querySelector('body').addEventListener('click', function(el) {
    const modal = document.querySelector('.modal');
    if(el.target.dataset.action === "modal") {
        modal.addEventListener('click', function(el) {
            modal.classList.add('hidden');
        });
    }

    if(el.target.dataset.action === "infos") {
        const id = el.target.dataset.id;
        let xhttp;
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if(this.readyState == 4 && this.status == 200) {
                const modalContainer = document.querySelector('.modal-container');
                modalContainer.innerHTML = "";

                const album = JSON.parse(this.response);
                const title = document.createElement('h2');
                const list = document.createElement('ul');
                const release = document.createElement('li');
                const author = document.createElement('li');
                const genreList = document.createElement('ul');
                const price = document.createElement('li');
                const count = document.createElement('li');
                //const coverContainer = document.createElement('div');
                //const cover = document.createElement('img');

                title.innerHTML = album.title;
                release.innerHTML = "Sortie : " + album.release;
                author.innerHTML = "Auteur : " + album.author.name;
                //cover.src = "/storage/img/" + album.cover;
                price.innerHTML = "Prix : " + album.price;
                count.innerHTML = "Articles restants : " + album.count;
                genreList.innerHTML = "Genres : ";
                for (let i = 0; i < album.genres.length; i++) {
                    const genre = document.createElement('li');
                    genre.innerHTML = album.genres[i].name;
                    genreList.appendChild(genre);
                }

                //coverContainer.appendChild(cover);
                list.appendChild(release);
                list.appendChild(author);
                list.appendChild(genreList);
                //list.appendChild(coverContainer);
                list.appendChild(price);
                list.appendChild(count);
                modalContainer.appendChild(title);
                modalContainer.appendChild(list);

                modal.classList.remove('hidden');
            }
        }
        xhttp.open("GET", "http://192.168.33.10/album/get/" + id, true);
        xhttp.send();
    }
});