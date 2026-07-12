<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add to Production</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <style>
        .form-container {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Add to Production</h2>
        <form id="productForm">
            <div class="mb-3">
                <label for="numProducts" class="form-label">Number of Products</label>
                <input type="number" class="form-control" id="numProducts" min="1" required>
            </div>
            <div id="productFields"></div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap.bundle@5.0.0-beta1/dist/js/bootstrap.min.js"></script>
    <script>
        const productForm = document.getElementById('productForm');
        const productFields = document.getElementById('productFields');

        document.getElementById('numProducts').addEventListener('input', function() {
            const numProducts = this.value;
            updateProductFields(numProducts);
        });

        function updateProductFields(numProducts) {
            productFields.innerHTML = '';
            for (let i = 1; i <= numProducts; i++) {
                const fieldSet = document.createElement('div');
                fieldSet.classList.add('mb-3');

                const itemName = document.createElement('input');
                itemName.type = 'text';
                itemName.classList.add('form-control');
                itemName.name = `itemName_${i}`;
                itemName.placeholder = `Name of Item ${i}`;
                itemName.required = true;

                const order = document.createElement('input');
                order.type = 'text';
                order.classList.add('form-control');
                order.name = `order_${i}`;
                order.placeholder = `Order ${i}`;
                order.required = true;

                const orderParty = document.createElement('input');
                orderParty.type = 'text';
                orderParty.classList.add('form-control');
                orderParty.name = `orderParty_${i}`;
                orderParty.placeholder = `Order Party's Name ${i}`;
                orderParty.required = true;

                const total = document.createElement('input');
                total.type = 'number';
                total.classList.add('form-control');
                total.name = `total_${i}`;
                total.placeholder = `Total ${i}`;
                total.required = true;

                fieldSet.appendChild(itemName);
                fieldSet.appendChild(order);
                fieldSet.appendChild(orderParty);
                fieldSet.appendChild(total);
                productFields.appendChild(fieldSet);
            }
        }

        productForm.addEventListener('submit', function(event) {
            event.preventDefault();
            const formData = new FormData(productForm);
            const products = [];

            for (let i = 1; i <= formData.get('numProducts'); i++) {
                const product = {
                    itemName: formData.get(`itemName_${i}`),
                    order: formData.get(`order_${i}`),
                    orderParty: formData.get(`orderParty_${i}`),
                    total: formData.get(`total_${i}`)
                };
                products.push(product);
            }

            console.log(products);

            // Send the products data to the server
            fetch('submit_to_production.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ products: products, status: 0 })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Products added to production successfully.');
                    productForm.reset();
                    productFields.innerHTML = '';
                } else {
                    alert('Failed to add products to production.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while adding products to production.');
            });
        });
    </script>
</body>
</html>
