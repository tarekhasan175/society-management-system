<script>


    let currentPage = 0;
    const formPages = document.querySelectorAll('.form-page');
    const nextButton = document.querySelector('.nexts'); // Select the Next button
    const previousButton = document.querySelector('.previous'); // Select the Next button
    const subButton = document.querySelector('.sub'); // Select the Next button

    function validateCurrentPage() {
        const inputs = formPages[currentPage].querySelectorAll('input[required], select[required], textarea[required]');

        let isValid = true;

        inputs.forEach(input => {
            if (input.value.trim() === '') {
                isValid = false;
                console.log('Validation error: Please fill in all required fields');
            } else if (!input.checkValidity()) {
                isValid = false;
                console.log('Validation error:', input.validationMessage);
            }
        });

        return isValid;
    }

    function showPage(increment) {
        const newPage = currentPage + increment;
        if (newPage >= 0 && newPage < formPages.length) {
            formPages[currentPage].classList.remove('active');
            formPages[newPage].classList.add('active');
            currentPage = newPage;

            if (currentPage === formPages.length - 1) {
                nextButton.style.display = 'none';
                subButton.style.display = 'block';
            } else {
                nextButton.style.display = 'block';
                subButton.style.display = 'none';
            }

            if (currentPage === 0) {
                previousButton.style.display = 'none';
            } else {
                previousButton.style.display = '';
            }
        }
    }


// date
    const today = new Date().toISOString().split('T')[0];
    document.getElementById('datePicker').value = today;




    function wordSection() {
        let city = document.getElementById('city').value;
        let word = document.getElementById('word');
        let url = "/nagarik/nagorik-city-to-word";
        let data = {
            City: city,
        };

        axios.post(url, data)
            .then(function (response) {
                console.log(response.data);
                const departments = response.data;

                word.innerHTML = '';

                let placeholderOption = document.createElement('option');
                placeholderOption.value = '';
                placeholderOption.text = '--Select --';
                word.appendChild(placeholderOption);

                departments.sort();

                departments.forEach(function (department) {
                    let option = document.createElement('option');
                    option.value = department.id;
                    option.text = department.name;
                    word.appendChild(option);
                });
            })
            .catch(function (error) {

            })
    }


    function sectorSection() {
        let word = document.getElementById('word').value;
        let section = document.getElementById('section');
        let url = "/nagarik/nagorik-word-to-sector";
        let data = {
            Word: word,
        };

        axios.post(url, data)
            .then(function (response) {
                console.log(response.data);
                const departments = response.data;

                section.innerHTML = '';

                let placeholderOption = document.createElement('option');
                placeholderOption.value = '';
                placeholderOption.text = '--Select --';
                section.appendChild(placeholderOption);

                departments.sort();

                departments.forEach(function (department) {
                    let option = document.createElement('option');
                    option.value = department.id;
                    option.text = department.name;
                    section.appendChild(option);
                });
            })
            .catch(function (error) {

            })
    }


    function blockSection() {
        let section = document.getElementById('section').value;
        let block = document.getElementById('block');
        let url = "/nagarik/nagorik-sector-to-block";
        let data = {
            Section: section,
        };

        axios.post(url, data)
            .then(function (response) {
                console.log(response.data);
                const departments = response.data;

                block.innerHTML = '';

                let placeholderOption = document.createElement('option');
                placeholderOption.value = '';
                placeholderOption.text = '--Select --';
                block.appendChild(placeholderOption);

                departments.sort();

                departments.forEach(function (department) {
                    let option = document.createElement('option');
                    option.value = department.id;
                    option.text = department.name;
                    block.appendChild(option);
                });
            })
            .catch(function (error) {

            })
    }


    function roadSection() {
        let block = document.getElementById('block').value;
        let road = document.getElementById('road');
        let url = "/nagarik/nagorik-block-to-road";
        let data = {
            Block: block,
        };

        axios.post(url, data)
            .then(function (response) {
                console.log(response.data);
                const departments = response.data;

                road.innerHTML = '';

                let placeholderOption = document.createElement('option');
                placeholderOption.value = '';
                placeholderOption.text = '--Select --';
                road.appendChild(placeholderOption);

                departments.sort();

                departments.forEach(function (department) {
                    let option = document.createElement('option');
                    option.value = department.id;
                    option.text = department.name;
                    road.appendChild(option);
                });
            })
            .catch(function (error) {

            })
    }



</script>
