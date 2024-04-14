import './bootstrap';

window.addEventListener('scroll', function() {
  const navbar = document.getElementById('navbar');

  if (window.scrollY > 0) {
    navbar.style.backgroundColor = 'rgba(15, 52, 70, 0.7)';
  } else {
    navbar.style.backgroundColor = 'rgba(15, 52, 70, 1)';
  }

})

async function deleteOrder(id) {
  const response = await fetch(`/orders/delete/${id}`, {
    method: "DELETE",
    headers: {
      'X-CSRF-TOKEN': '{{ csrf_token() }}',
      'Content-Type': 'application/json'
    }
  })

  const result = await response.json();

  if (result.ok) {

  }
}
