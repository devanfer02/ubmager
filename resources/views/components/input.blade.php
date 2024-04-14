<div class="mb-3 tw-w-full">
  <label
    for="{{ $id }}"
    class="form-label tw-text-cst-black tw-font-semibold">
    {{ $name }} @if($required) <span class="tw-text-red-600"> *</span> @endif
  </label>
  <input
    type="{{ $type }}"
    class="form-control shadow-none tw-border tw-border-cst-black {{ $class }} @error($id) is-invalid @enderror"
    id="{{ $id }}" name="{{ $id }}"
    value="{{ $value }}"
    placeholder="{{ $placeHolder }}"
    @if($required) required @endif
    @if(!$autoComplete) autocomplete="off" @endif
  >
  @error($id)
  <div class="invalid-feedback">
    {{ $message }}
  </div>
  @enderror
</div>
