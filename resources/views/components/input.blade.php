<div class="mb-3">
  <label
    for="{{ $id }}"
    class="form-label tw-text-cst-black tw-font-semibold">
    {{ $name }}
  </label>
  <input
    type="{{ $type }}"
    class="form-control shadow-none tw-border tw-border-cst-black {{ $class }}"
    id="{{ $id }}" name="{{ $id }}"
    value="{{ $value }}"
    required
  >
  @error($id)
  <div class="invalid-feedback">
    {{ $message }}
  </div>
  @enderror
</div>
