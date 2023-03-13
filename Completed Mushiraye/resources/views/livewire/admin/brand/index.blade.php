
  <!-- Add Modal -->
  <div wire:ignore.self class="modal fade" id="addBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Add Brand</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form wire:submit.prevent="storeBrand">
                <div class="modal-body">
                    <div class="mb-3">
                        <label> Select Category </label>
                        <select wire:model.defer="category_id" required class="form-control">
                        <option value="">-- Select Category --</option>
                            @foreach ($categories as $cateItem)
                                    <option value="{{$cateItem->id}}">{{$cateItem->name}}</option>           
                            @endforeach
                        </select>
                        @error('category_id')<small class="text-danger">{{$message }}</small>@enderror
                    </div>
                <div class="mb-3">
                    <label> Brand Name </label>
                    <input  type="text" wire:model.defer="name" class="form-control">
                    @error('name')<small class="text-danger">{{$message }}</small>@enderror
                </div>
                <div class="mb-3">
                    <label> Brand Slug </label>
                    <input  type="text" wire:model.defer="slug"class="form-control">
                    @error('slug')<small class="text-danger">{{$message }}</small>@enderror
                </div>
                <div class="mb-3">
                    <label> Status </label>
                    <input  type="checkbox" wire:model.defer="status"> Checked = Hidden, Unchecked = Vissible
                    @error('status')<small class="text-danger">{{$message }}</small>@enderror
                </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </div>
    </div>
  </div>
 <!-- End of Add Modal -->

<!-- update Modal -->
<div class="modal fade" id="updateBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Update Brand</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form wire:submit.prevent="updateBrand">
            <div class="modal-body">
                <div class="mb-3">
                    <label> Select Category </label>
                    <select wire:model.defer="category_id" required class="form-control">
                    <option value="">-- Select Category --</option>
                        @foreach ($categories as $cateItem)
                                <option value="{{$cateItem->id}}">{{$cateItem->name}}</option>           
                        @endforeach
                    </select>
                    @error('category_id')<small class="text-danger">{{$message }}</small>@enderror
                </div>
                
                <div class="mb-3">
                    <label> Brand Name </label>
                    <input  type="text" wire:model.defer="name" class="form-control">
                    @error('name')<small class="text-danger">{{$message}}</small>@enderror

                </div>
                <div class="mb-3">
                    <label> Brand Slug </label>
                    <input  type="text" wire:model.defer="slug"class="form-control">
                    @error('slug')<small class="text-danger">{{$message}}</small>@enderror
                </div>
                <div class="mb-3">
                    <label> Status </label>
                    <input  type="checkbox" wire:model.defer="status" {{-- style="width:70px;height:70px;" --}}> Checked = Hidden, Unchecked = Vissible
                    @error('status')<small class="text-danger">{{$message }}</small>@enderror
                </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
      </div>
    </div>
  </div>
 <!-- End of update Modal -->


  <!-- Delete Modal -->

    <div  wire:ignore.self class="modal fade" id="deleteModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">Model Delete</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="destroyBrand">
                <div class="modal-body">
                <h6>Are you sure you want to delete this data?</h6>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancle</button>
                <button type="submit" class="btn btn-primary">Yes, Delete</button>
                </div>
            </form>
          </div>
        </div>
    </div>
 <!-- End of Delete Modal -->





    <div class="row">
        <div class="col-md-12">
            @if(session('message'))
                <div class="alert alert-success">{{session('message')}} </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3>Brand List
                        <a href ="#" data-bs-toggle="modal" data-bs-target="#addBrandModal" class="btn btn-primary btn-sm  float-end"> Add Brand </a>
                    </h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Slug</th>
                            <th>Status</th>
                            <th>Action</th>  
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($brands as $brand)       
                                <tr>
                                    <td>{{$brand->id}} </td>
                                    <td>{{$brand->name}}  </td>
                                    <td>
                                        @if($brand->category)
                                             {{$brand->category->name}}  
                                        @else
                                            No Category
                                        @endif
                                    </td>
                                    <td>{{$brand->slug}} </td>
                                    <td>{{$brand->status == '1' ? 'Hidden' : 'Visible'}} </td>
                                    <td>
                                        <a href= "#" wire:click="editBrand({{$brand->id}})" data-bs-toggle="modal" data-bs-target="#updateBrandModal" class="btn btn-success">Edit</a>
                                        <a href= "#" wire:click="deleteBrand({{$brand->id}})" data-bs-toggle="modal" data-bs-target="#deleteModal" class="btn btn-danger" >Delete  </a>
                                    </td>
                                
                                </tr>
                            @endforeach 
                        </tbody>
                    </table>
                    <div> 
                        {{$brands->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>
</div>
@push('script')

    <script>
        window.addEventListener('close-modal', event => {
            $('#addBrandModal').modal('hide');
        });
    
    </script>

@endpush
