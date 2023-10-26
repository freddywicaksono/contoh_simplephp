
/*
Filename : lib/MatakuliahCombo.js
Tools : SimplePHPBot
Author : Freddy Wicaksono, M.Kom
*/
function populateMatakuliah() {
    let fetchUrl = '../lib/matakuliahCombo.php';
    fetch(fetchUrl)
        .then(response => response.json())
        .then(data => {
            const select = document.getElementById('matakuliah_id');
            // Clear existing options
            select.innerHTML = '';
            // Loop through the data and create options
            data.forEach(item => {
                const option = document.createElement('option');
                option.value = item.id; // You can set the value to the matakuliah ID
                option.textContent = `${item.namamk}`;
                select.appendChild(option);
            });
            // After populating the combo box, you can call fetchData if needed
            fetchData();
        })
        .catch(error => console.error('Error:', error));
}
function fetchDataMatakuliah() {
    // Assuming you have obtained the 'id' from the browser
    var matakuliah = document.getElementById('matakuliah');
    var id = matakuliah.dataset.id;
    
    if (id !== null) {
        let fetchUrl = '../lib/matakuliahCombo.php?id='+id;
        fetch(fetchUrl)
            .then(response => response.json())
            .then(data => {
                const select = document.getElementById('matakuliah_id');
                // Set the selected option based on the provided ID
                select.value = id;
            })
            .catch(error => console.error('Error:', error));
    }
}
populateMatakuliah();
fetchDataMatakuliah();