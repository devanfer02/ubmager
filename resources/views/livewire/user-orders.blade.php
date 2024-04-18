<section class="tw-w-full tw-mt-5">
  <section class="tw-flex tw-flex-row">
    <section class="tw-w-1/2 tw-cursor-pointer tw-flex tw-justify-center " wire:click="toggleView('availableOrders')">
      <iconify-icon icon="ri:todo-line" width="30" height="30" class="@if($showAvailable) tw-text-cst-yellow @endif"></iconify-icon>
    </section>
    <section class="tw-w-1/2 tw-cursor-pointer tw-flex tw-justify-center" wire:click="toggleView('completedOrders')">
      <iconify-icon icon="ic:outline-event-available" width="30" height="30" class="@if(!$showAvailable) tw-text-cst-yellow @endif"></iconify-icon>
    </section>
  </section>
  <div class="tw-h-[1px] tw-bg-cst-blue tw-w-full tw-mt-5"></div>
  <section class="tw-flex tw-justify-center">
    <img wire:loading.flex src="https://media1.tenor.com/m/BLvS0Wn8BvAAAAAC/loading-waiting.gif" alt="loading">
  </section>
  <section wire:loading.remove class="tw-grid tw-grid-cols-1 md:tw-grid-cols-2 lg:tw-grid-cols-3 gap-2 lg:tw-gap-5 mt-3">
    @if($showAvailable)
      @foreach ($availableOrders as $order)
        <x-order-card :order="$order"/>
      @endforeach
    @else
      @foreach ($completedOrders as $order)
        <x-order-card :order="$order"/>
      @endforeach
    @endif
  </section>
</section>

