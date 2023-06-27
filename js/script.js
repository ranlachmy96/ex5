
const Select = document.createElement('select');

function showData(data) {
    for (const key in data.categories) {
        const option = document.createElement('option');
        const categoryName = data.categories[key].name;
        option.textContent = categoryName;
        Select.appendChild(option);
    }
    document.getElementById("selectGenre").appendChild(Select);
}

Select.addEventListener('change', function () {
    const selectedOption = this.value;
    const bookWrappers = document.querySelectorAll(".bookAndTextWrapper");
  
    if (selectedOption === 'All') {
      bookWrappers.forEach(wrapper => {
        wrapper.style.display = "flex";
      });
    } else {
      bookWrappers.forEach(wrapper => {
        const category = wrapper.parentElement.className;
        if (category === selectedOption) {
          wrapper.style.display = "flex";
        } else {
          wrapper.style.display = "none";
        }
      });
    }
  });

fetch("data/category.json")
    .then(Response => Response.json())
    .then(data => showData(data));