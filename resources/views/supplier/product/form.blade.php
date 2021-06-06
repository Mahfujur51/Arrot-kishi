@extends('layouts.supplier-app')

@section('product','active')
@section('title','Create product')

@section('content')
    <div class="container-fluid">

        <!-- Widgets -->
        <div class="row clearfix">
            <div class="card">
                <div class="header">

                    <h2>Create Product</h2>

                </div>
                <div class="body">
                   <div class="row">
                       <form id="form_validation" accept="" method="POST">
                           @csrf
                       <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

                               <div class="form-group form-float">
                                   <div class="form-line error">
                                       <input type="text" class="form-control @error('product_name') is-invalid @enderror" name="product_name" required>
                                       <label class="form-label">Product Name</label>
                                       @error('product_name')
                                        <span class="invalid-feedback">{{ $message }}</span>    
                                       @enderror
                                   </div>
                               </div>
                              
                             <div class="form-group form-float">
                                <div class="form-line error">
                                    <input type="text" class="form-control @error('purchase_rate') is-invalid @enderror" name="purchase_rate" required>
                                    <label class="form-label">Purchase Rate</label>
                                    @error('purchase_rate')
                                     <span class="invalid-feedback">{{ $message }}</span>    
                                    @enderror
                                </div>
                            </div>
                           
                               <div class="form-group form-float">
                                   <div class="form-line">
                                       <input type="email" class="form-control" name="email" required>
                                       <label class="form-label">Email</label>
                                   </div>
                               </div>
                               <div class="form-group">
                                   <input type="radio" name="gender" id="male" class="with-gap">
                                   <label for="male">Male</label>

                                   <input type="radio" name="gender" id="female" class="with-gap">
                                   <label for="female" class="m-l-20">Female</label>
                               </div>
                               <div class="form-group form-float">
                                   <div class="form-line">
                                       <textarea name="description" cols="30" rows="5" class="form-control no-resize" required></textarea>
                                       <label class="form-label">Description</label>
                                   </div>
                               </div>
                               <div class="form-group form-float">
                                   <div class="form-line">
                                       <input type="password" class="form-control" name="password" required>
                                       <label class="form-label">Password</label>
                                   </div>
                               </div>
                               <div class="form-group">
                                   <input type="checkbox" id="checkbox" name="checkbox">
                                   <label for="checkbox">I have read and accept the terms</label>
                               </div>
                               <button class="btn btn-primary waves-effect" type="submit">SUBMIT</button>

                       </div>

                       <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

                        <div class="form-group form-float">
                            <div class="form-line error">
                                <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" required>
                                
                                @error('image')
                                 <span class="invalid-feedback">{{ $message }}</span>    
                                @enderror
                            </div>
                         </div>
                         <div class="form-group form-float">
                            <div class="form-line error">
                                <input type="text" class="form-control @error('sales_rate') is-invalid @enderror" name="sales_rate" required>
                                <label class="form-label">Sales Rate</label>
                                @error('sales_rate')
                                 <span class="invalid-feedback">{{ $message }}</span>    
                                @enderror
                            </div>
                        </div>
                               <div class="form-group form-float">
                                   <div class="form-line">
                                       <input type="text" class="form-control" name="surname" required>
                                       <label class="form-label">Surname</label>
                                   </div>
                               </div>
                               <div class="form-group form-float">
                                   <div class="form-line">
                                       <input type="email" class="form-control" name="email" required>
                                       <label class="form-label">Email</label>
                                   </div>
                               </div>
                               <div class="form-group">
                                   <input type="radio" name="gender" id="male" class="with-gap">
                                   <label for="male">Male</label>

                                   <input type="radio" name="gender" id="female" class="with-gap">
                                   <label for="female" class="m-l-20">Female</label>
                               </div>
                               <div class="form-group form-float">
                                   <div class="form-line">
                                       <textarea name="description" cols="30" rows="5" class="form-control no-resize" required></textarea>
                                       <label class="form-label">Description</label>
                                   </div>
                               </div>
                               <div class="form-group form-float">
                                   <div class="form-line">
                                       <input type="password" class="form-control" name="password" required>
                                       <label class="form-label">Password</label>
                                   </div>
                               </div>
                               <div class="form-group">
                                   <input type="checkbox" id="checkbox" name="checkbox">
                                   <label for="checkbox">I have read and accept the terms</label>
                               </div>
                               <button class="btn btn-primary waves-effect" type="submit">SUBMIT</button>

                       </div>
                       </form>
                   </div>

                </div>

        </div>

    </div>
@endsection
