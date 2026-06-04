@extends('layouts.mainlayout') @section('content') <h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Home /</span> Items
</h4>
<!-- Bordered Table -->

 @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

 <div class="card">


<div class="card-header">
  <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">

 

    <h5 class="mb-0">Edit Items</h5>

  




  </div>
</div>
<div class="card-body">
  <div class="table-responsive text-nowrap">

   <div class="modal-body" style="max-height:auto; overflow-y:auto;">
         
<form method="POST"
      id="editItemForm"
      enctype="multipart/form-data">

    @csrf

    <div class="modal-header">
      
        <button type="button"
                class="btn-close"
                data-bs-dismiss="modal"></button>
    </div>

    

        <input type="hidden" name="item_type" value="1">

        <div class="row g-3">

            <!-- Item Name -->
            <div class="col-md-6">
                <label class="form-label fw-semibold">
                    Item Name
                </label>

                <input type="text"
                       name="name"
                       id="editName"
                       class="form-control" value="{{$items->name}}"
                       required>
            </div>

            <!-- Category -->
            <div class="col-md-6">
                <label class="form-label fw-semibold">
                    Category
                </label>

                <select name="cat_id"
                        id="editCategory"
                        class="form-select"
                        required>

                    <option value="">Select Category</option>

                   @foreach($categories as $category)
    <option value="{{ $category->id }}"
        @selected($category->id == $items->cat_id)>
        {{ $category->category_name }}
    </option>
@endforeach
                </select>
            </div>

            <!-- Brand -->
            <div class="col-md-6">
                <label class="form-label fw-semibold">
                    Brand Name
                </label>

                <select name="author_id"
                        id="editAuthor"
                        class="form-select"
                        required>

                    <option value="">Select Brand</option>



                    @foreach($authors as $author)
                        <option value="{{ $author->id }}"  @selected($author->id == $items->author_id)>
                            {{ $author->author_name }}
                        </option>
                    @endforeach

                </select>
            </div>

            <!-- HSN -->
            <div class="col-md-6">
                <label class="form-label fw-semibold">
                    HSN Code
                </label>

                <select name="hsnid"
                        id="editHnscode"
                        class="form-select"
                        required>

                    <option value="">Select HSN Code</option>

                    @foreach($hsncode as $hsncodes)
                        <option value="{{ $hsncodes->id }}"  @selected($hsncodes->id == $items->hsnid)>
                            {{ $hsncodes->code }}
                        </option>
                    @endforeach

                </select>
            </div>

            <!-- MRP -->
            <div class="col-md-6">
                <label class="form-label fw-semibold">
                    MRP (₹)
                </label>

                <input type="number"
                       name="mrp"
                       id="editMrp"
                       class="form-control" value="{{$items->mrp}}">
            </div>

            <!-- Selling Rate -->
            <div class="col-md-6">
                <label class="form-label fw-semibold">
                    Selling Rate (₹)
                </label>

                <input type="number"
                       name="sr"
                       id="editSr"
                       class="form-control" value="{{$items->sr}}">
            </div>

            <!-- Current Image -->
            <div class="col-md-6">
                <label class="form-label fw-semibold">
                    Current Image
                </label>

                <div>
                    <img id="editImagePreview"
                         src=""
                         class="img-thumbnail"
                         width="120">
                </div>
            </div>

            <!-- New Image -->
            <div class="col-md-6">
                <label class="form-label fw-semibold">
                    Replace Image
                    <small class="text-muted">
                        (249 × 342 px)
                    </small>
                </label>

                <input type="file"
                       name="image"
                       class="form-control"
                       accept="image/png,image/jpeg">
            </div>

            <!-- Description -->
            <div class="col-12">
                <label class="form-label fw-semibold">
                    Description
                </label>

                <textarea name="description"
                          id="editDescription"
                          rows="4"
                          class="form-control">{{$items->description}}</textarea>
            </div>

        </div>

        <!-- Product Variants -->

        
            <div class="card-body">

               <div class="card">
    <div class="card-header">
        <h5>Product Variants</h5>
    </div>

    @foreach($availableAttributes as $varients)

    <div id="variantContainer">

    <div class="variant-item border rounded p-3 mb-3">
        <div class="row">

            <div class="col-md-4">
                <label>Variant</label>
                <select name="variant_id[]" class="form-control variant-select" data-index="0">
                    <option value="">Select Variant</option>

                    @foreach($variants as $variant)
                        <option value="{{ $variant->id }}"  @selected($variant->id == $varients->variant_id)>
                            {{ $variant->varient_name }}
                        </option>
                    @endforeach

                </select>
            </div>

            <div class="col-md-6 ">
             <label>Product Attributes</label>
             @php 
                $type=$varients->variant_id;
                $attributes=DB::table('product_attributes')->where('varient_id',$type)->get();
                $i=0;
                 $selectedAttributes = explode(',', $varients->attribute_id);
             @endphp
            @foreach($attributes as $attr)

    <div class="form-check form-check-inline me-3">

        <input
            type="checkbox"
            class="form-check-input"
            name="attribute_ids[{{ $i }}][]"
            value="{{ $attr->id }}"
            id="attr_{{ $i }}_{{ $attr->id }}"
            {{ in_array($attr->id, $selectedAttributes) ? 'checked' : '' }}
        >

        <label
            class="form-check-label"
            for="attr_{{ $i }}_{{ $attr->id }}">
            {{ $attr->value }}
        </label>

    </div>

@endforeach

           
            </div>

            <div class="col-md-2 d-flex align-items-end">
                <button type="button"
                        class="btn btn-danger removeVariant">
                    Remove
                </button>
            </div>

        </div>

       
    </div>

    @endforeach


                <div class="mt-2">
                  <button type="button" class="btn btn-primary btn-sm AddVariant">
    Add Variant
</button>
                </div>

            </div>

        </div>

    </div>

    <div class="modal-footer">

        <button type="button"
                class="btn btn-outline-secondary"
                data-bs-dismiss="modal">
            Close
        </button>

        <button type="submit"
                class="btn btn-primary px-4">
            Update Item
        </button>

   

</form>

        </div>

    
</div>

      
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        const editItemModal = document.getElementById('EditItemmodal');
        const form = document.getElementById('editItemForm');
        editItemModal.addEventListener('show.bs.modal', function(event) {
          const button = event.relatedTarget;
          form.action = "{{ url('items/update') }}/" + button.dataset.id;
          document.getElementById('editName').value = button.dataset.name;
          document.getElementById('editAuthor').value = button.dataset.author;
          document.getElementById('editHnscode').value = button.dataset.hsnid;
          document.getElementById('editCategory').value = button.dataset.category;
          document.getElementById('editMrp').value = button.dataset.mrp;
          document.getElementById('editDescription').value = button.dataset.description;
          document.getElementById('editSr').value = button.dataset.sr;
          document.getElementById('edititemtype').value = button.dataset.item_type;
          
          document.getElementById('editImagePreview').src = `/assets/img/items/${button.dataset.image}`;
         
        });

       



      });


    
    </script>

 <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>  
<script>

$(document).ready(function () {

function createVariantRow(index, container, selectedVariant = '', selectedAttributes = []) {

    let options = '<option value="">Select Variant</option>';

    @foreach($variants as $variant)
        options += `
            <option value="{{ $variant->id }}"
                ${selectedVariant == '{{ $variant->id }}' ? 'selected' : ''}>
                {{ $variant->varient_name }}
            </option>
        `;
    @endforeach

    let html = `
        <div class="variant-item border rounded p-3 mb-3">

            <div class="row">

                <div class="col-md-4">
                    <label>Variant</label>

                    <select
                        name="variant_id[]"
                        class="form-control variant-select"
                        data-index="${index}">

                        ${options}

                    </select>
                </div>

                <div class="col-md-6">
                    <label>Product Attributes</label>

                    <div id="attribute-select-${index}"></div>
                </div>

                <div class="col-md-2">
                    <button
                        type="button"
                        class="btn btn-danger removeVariant">
                        Remove
                    </button>
                </div>

            </div>

        </div>
    `;

    container.append(html);

    if (selectedVariant) {

        loadAttributes(
            selectedVariant,
            $(`#attribute-select-${index}`),
            selectedAttributes,
            index
        );
    }

    $('.variant-select').select2({
        dropdownParent: $('#EditItemmodal')
    });
}

    let rowIndex = 1;

    let editIndex = 1;

    const variantOptions = `
        <option value="">Select Variant</option>
        @foreach($variants as $variant)
            <option value="{{ $variant->id }}">
                {{ $variant->varient_name }}
            </option>
        @endforeach
    `;

    function initializeSelect2() {
        $('.variant-select').select2({
            dropdownParent: $('#editItemModal')
        });
    }

    function loadAttributes(variantId, container, selectedAttributes = [], index) {

        $.ajax({
            url: "{{ url('get-attributes') }}/" + variantId,
            type: "GET",
            dataType: "json",

            success: function (attributes) {

        //   console.log(selectedAttributes);

       
                let html = '';
$.each(attributes, function (_, attr) {

    let attrId = parseInt(attr.id);

    let isChecked = selectedAttributes.includes(attrId);

    html += `
        <div class="form-check form-check-inline me-3">

            <input
                type="checkbox"
                class="form-check-input"
                name="attribute_ids[${index}][]"
                value="${attrId}"
                id="attr_${index}_${attrId}"
                ${isChecked ? 'checked="checked"' : ''}>

            <label
                class="form-check-label"
                for="attr_${index}_${attrId}">
                ${attr.value}
            </label>

        </div>
    `;
});

                container.html(html);
            }
        });
    }

    // Edit Variant
    $(document).on('click', '.edititemvarients', function () {

        const productId = $(this).data('id');

        $('#editVariantContainer').empty();

        $.ajax({
            url: "{{ url('get-productattributes') }}/" + productId,
            type: "GET",
            dataType: "json",

            success: function (res) {

               

                $.each(res.productVariants, function (variantId, selectedItems) {

                    let selectedAttributes = [];

                    $.each(selectedItems, function (_, item) {

                        if (item.attribute_ids) {

                            $.each(item.attribute_ids, function (_, attrId) {
                                selectedAttributes.push(parseInt(attrId));
                            });

                        }
                    });

                    let options = '<option value="">Select Variant</option>';

                    $.each(res.variants, function (_, variant) {

                        options += `
                            <option value="${variant.id}"
                                ${variant.id == variantId ? 'selected' : ''}>
                                ${variant.varient_name}
                            </option>
                        `;
                    });

                    const html = `
                        <div class="variant-item border rounded p-3 mb-3">
                            <div class="row">

                                <div class="col-md-4">
                                    <label>Variant</label>
                                    <select
                                        name="variant_id[]"
                                        class="form-control variant-select"
                                        data-index="${editIndex}">
                                        ${options}
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label>Product Attributes</label>
                                    <div id="attribute-select-${editIndex}"></div>
                                </div>

                                <div class="col-md-2">
                                    <button type="button"
                                            class="btn btn-danger removeVariant">
                                        Remove
                                    </button>
                                </div>

                            </div>
                        </div>
                    `;

                    $('#editVariantContainer').append(html);

                    loadAttributes(
                        variantId,
                        $(`#attribute-select-${editIndex}`),
                        selectedAttributes,
                        editIndex
                    );

                    editIndex++;
                });

                initializeSelect2();
            }
        });
    });

    let addIndex = 1;
  

$(document).on('click', '.addVariant', function () {

    createVariantRow(
        addIndex,
        $('#variantContainer')
    );

    addIndex++;
});


$(document).on('click', '.editAddVariant', function () {
editIndex++;
    createVariantRow(
        editIndex,
        $('#editVariantContainer')
    );

    
});
    // Remove Variant
    $(document).on('click', '.removeVariant', function () {
        $(this).closest('.variant-item').remove();
    });

    // Change Variant
   $(document).on('change', '.variant-select', function () {

    let variantId = $(this).val();
    let index = $(this).data('index');

    let container = $(
        '#attribute-select-' + index
    );

    container.empty();

    if (!variantId) {
        return;
    }

    loadAttributes(
        variantId,
        container,
        [],
        index
    );

});

});
</script>
  </div>
</div>
</div>
<style>
.pagination {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-wrap: nowrap;
}

.pagination li {
    list-style: none;
}

.pagination .page-link {
    padding: 6px 12px;
    margin: 0 3px;
}

.pagination svg {
    width: 16px;
    height: 16px;
}
</style>


<!--/ Bordered Table --> @endsection

