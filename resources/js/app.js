import './bootstrap';

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
