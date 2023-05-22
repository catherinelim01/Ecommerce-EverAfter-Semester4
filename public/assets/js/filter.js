
// select the new arrival container with class "new-arrival2"
const newArrivalContainer = document.querySelector('.new-arrival2');

// select all product items with class "select-job-items2"
const productItems = newArrivalContainer.querySelectorAll('.select-job-items2');

// create an array to store filtered product items
let filteredProducts = [];

// loop through all product items and filter by category_id
for (let i = 0; i < productItems.length; i++) {
  const category_id = productItems[i].dataset.category_id;

  if (category_id === '<?php echo $category_id ?>') {
    filteredProducts.push(productItems[i]);
  }
}

// filter by product_id
filteredProducts = filteredProducts.filter(productItem => {
  const product_id = productItem.dataset.product_id;
  const size = product_id[4];

  if ('<?php echo $size ?>' === '0' || size === '<?php echo $size ?>') {
    return true;
  }

  return false;
});

// filter by product_price
filteredProducts = filteredProducts.filter(productItem => {
  const product_price = productItem.dataset.product_price;

  if ('<?php echo $price ?>' === '1' && product_price >= 100000 && product_price <= 200000) {
    return true;
  } else if ('<?php echo $price ?>' === '2' && product_price >= 200000 && product_price <= 300000) {
    return true;
  } else if ('<?php echo $price ?>' === '3' && product_price >= 300000 && product_price <= 400000) {
    return true;
  }

  return false;
});

// display filtered product items
filteredProducts.forEach(productItem => {
  productItem.style.display = 'block';
});
