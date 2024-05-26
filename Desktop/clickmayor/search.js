search.js
document.getElementById('searchForm').addEventListener('submit', function(event) {
    event.preventDefault();
    
    const query = document.getElementById('query').value;
    
    fetch(`busqueda.php?query=${query}`)
        .then(response => response.json())
        .then(data => {
            const resultsSection = document.getElementById('results');
            resultsSection.innerHTML = '';
            
            if (data.length > 0) {
                data.forEach(item => {
                    const article = document.createElement('article');
                    article.innerHTML = `
                        <h2>${item.title}</h2>
                        <p>${item.content}</p>
                    `;
                    resultsSection.appendChild(article);
                });
            } else {
                resultsSection.innerHTML = '<p>No se encontraron resultados.</p>';
            }
        })
        .catch(error => console.error('Error:', error));
});