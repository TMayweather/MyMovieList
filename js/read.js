var movies = '';
$.ajax({
    type: "GET",
    url: 'api/movie/read.php',
    success: function (data) {
        useData(data);
    }
});

const useData = (data, movies) => {
    movies = data.data;
    console.log(movies);
    listMovies(movies)
}

const listMovies = (movies) => {
    movies.forEach((movie) => {
        const listDiv = document.querySelector('#list')
        const title = document.createElement('h3')
        const image = document.createElement('img')
        const summary = document.createElement('p')
        const genre = document.createElement('h5')
        const releaseYear = document.createElement('h5')
        const rating = document.createElement('span')

        title.textContent = movie.title
        image.setAttribute("src", movie.image)
        summary.textContent = movie.summary
        genre.textContent = movie.genre
        releaseYear.textContent = movie.release_year
        rating.textContent = movie.rating
        listDiv.append(title, image, summary, genre, releaseYear, rating)   
})
return listMovies
}