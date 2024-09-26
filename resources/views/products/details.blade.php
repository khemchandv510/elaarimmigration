@extends('layouts.app')

@section('content')


@if(Session::has('message'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif


<div class="card mb-4 col-md-12">
    <form action="{{route('product.update', $products->id)}}" enctype="multipart/form-data" method="post">
        @csrf
        <div class="card-header">Information</div>

        <div class="card-body">

            <div class="form-group">
                <label for="exampleFormControlInput1">Page Name</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" required name="pageName" value="{{$products->name}}" placeholder="name">
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Category</label>
                        <select type="text" name="category" class="form-control" onchange="getsubcategroy(this.value)" required>
                            <option value="">None</option>
                            @foreach($category as $categories)
                            <option value="{{$categories->id}}" {{ $categories->id == $products->category_id ? 'selected' : '' }} >{{$categories->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Sub category</label>
                        <select type="text" id="subcategory" name="subcategory" class="form-control"  onchange="getsubsubcategroy(this.value)">
                            <option value="">None</option>
                            @foreach($subCategory as $categories)
                            <option value="{{$categories->id}}" {{ $categories->id == $products->sub_category_id ? 'selected' : '' }} >{{$categories->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Sub Sub category</label>
                        <select type="text" id="subSubcategory" name="subSubcategory" class="form-control" >
                            <option value="">None</option>
                             @foreach($subSubCategory as $categories)
                            <option value="{{$categories->id}}" {{ $categories->id == $products->child_category_id ? 'selected' : '' }} >{{$categories->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>


        <!-- page card -->
        <div class="card bg-light mb-3">
            <div class="card-header">Page card </div>
            <div class="card-body">


            <div class="form-group">
                <label for="exampleFormControlInput1">Title</label>
                <input type="text" class="form-control" id="exampleFormControlInput1"  name="PcardTitle" value="{{$products->PcardTitle}}" placeholder="name">
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput1">Description</label>
                <textarea class="form-control editor1" name="pageCardDescription" rows="3">{{$products->pageCardDescription}} </textarea>
            </div>

            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addPageCardModal"> Add page card </button>

            <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Keyword</th>
                    <th scope="col">Url</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $count = 0
                    @endphp
                    @foreach($pagecardData as $page)
                    
                    <tr>
                    <th scope="row">{{$page->id}}</th>
                    <td>{{ $page->keyword }}</td>
                    <td>{{ $page->url }}</td>
                    <td> 
                     <button type="button" class="btn btn-primary" onclick="editpagecard({{ $page->id }})" > <i class="fa fa-edit" aria-hidden="true"></i> </button>
                    
                    <a href="{{route('delete.pageCard', $page->id)}}"><i class="fa fa-trash" aria-hidden="true"></i> </a>
                    
                    </td>
                    </tr>
                @endforeach
                </tbody>
                </table>

              
            </div>
        </div>

        <!-- end page card -->



        <!-- page content -->
        <div class="card bg-light mb-3">
            <div class="card-header">Page content</div>
            <div class="card-body">

            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addPageContent"> Add page Content </button>

            <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Image</th>
                    <th scope="col">Url</th>
                    <th scope="col">Content</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $count = 0
                    @endphp
                    @foreach($pageContent as $page)
                    
                    <tr>
                    <th scope="row">{{$page->id}}</th>
                    
                    <td> <img src="{{ asset('/public/images') }}/{{$page->image}}" width="100px"> 
                        @if($page->image != null)
                     <a href="{{route('delete.pageImage', $page->id)}}"><i class="fa fa-trash" aria-hidden="true"></i> </a>
                        @endif
                    </td>
                    <td>{{$page->url}}</td>
                    <td>
                        <textarea class="form-control editor1" readonly  rows="3"> {{$page->description}} </textarea>
                    </td>
                           
                    <td> 
                     <button type="button" class="btn btn-primary" onclick="editpageContent({{$page->id }})" > <i class="fa fa-edit" aria-hidden="true"></i> </button>
                    
                    
                    <a href="{{route('page.delete', $page->id)}}"><i class="fa fa-trash" aria-hidden="true"></i> </a>
                    
                    </td>
                    </tr>
                @endforeach
                </tbody>
                </table>

              
            </div>
        </div>

        
        <!-- faq -->
        <div class="card bg-light mb-3">
            <div class="card-header">Faq</div>
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Title</label>
                    <input type="text" class="form-control"  id="exampleFormControlInput1" value="{{$products->faq_title}}" name="faqtitle" placeholder="">
                </div>


                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop"> Add Faq </button>

                
                <table class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @php
                        $count = 0;
                        @endphp
                    @foreach($faqs as $faq)
                         @php
                            $count++;
                        @endphp
                        <tr>
                        <th scope="row">{{$count}}</th>
                        <td> {{$faq->name}} </td>
                        <td>
                            
                         <button type="button" class="btn btn-primary" onclick="editfaq({{$faq->id }})" > <i class="fa fa-edit" aria-hidden="true"></i> </button>
                         
                        <a href="{{route('faq.delete', $faq->id)}}"><i class="fa fa-trash" aria-hidden="true"></i> </a> 
                                            
                        </td>

                    
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>





         <!-- Custom Keywords -->
         <div class="card bg-light mb-3">
            <div class="card-header">Keywords</div>
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Title</label>
                    <input type="text" class="form-control"  id="exampleFormControlInput1" value="{{$products->keyword_title}}" name="customKeyword" placeholder="">
                </div>


                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#customKeywordPopop"> Add Keyword </button>

                
                <table class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Keyword</th>
                        <th scope="col">Keyword Url</th>
                        </tr>
                    </thead>
                    <tbody>

                    @foreach($keyword as $faq)
                        <tr>
                        <th scope="row">1</th>
                        <td> {{$faq->name}} </td>
                        <td> {{$faq->link}} </td>

                        <td> 
                            
                        <button type="button" class="btn btn-primary" onclick="editkeywords({{$faq->id }})" > <i class="fa fa-edit" aria-hidden="true"></i> </button>
                        
                        <a href="{{ route('keyword.delete', $faq->id) }}"><i class="fa fa-trash" aria-hidden="true"></i> </a> 
                        
                    </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>



        <!-- Custom adds -->
        <div class="card bg-light mb-3">
            <div class="card-header">Custom Adds</div>
            <div class="card-body">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#customAdd"> Add Custom Add </button>
                
                <table class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col"> Url</th>
                        </tr>
                    </thead>
                    <tbody>

                    @foreach($CustomAdd as $faq)
                        <tr>
                            <th scope="row">{{$faq->id}}</th>
                            <th>  <img src="{{ asset('/public/images') }}/{{$faq->image}}" width="100px"> </td> </th>
                            <td> {{$faq->add_name}} </td>
                            <td> {{$faq->add_url}} </td>
    
                            <td>
                                
                            <button type="button" class="btn btn-primary" onclick="editCustomAdds({{$faq->id }})" > <i class="fa fa-edit" aria-hidden="true"></i> </button>

                            <a href="{{ route('customadds.delete', $faq->id) }}"><i class="fa fa-trash" aria-hidden="true"></i> </a> 
                                                
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>


        <!-- seo information -->
        <div class="card bg-light mb-3">
            <div class="card-header">Seo</div>
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Meta Tag</label>
                    <input type="text" name="metatag" class="form-control" id="exampleFormControlInput1" value="{{$products->metaTag}}" placeholder="name">
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Meta tag description</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="metadescription" rows="3">{{$products->meta_desc}} </textarea>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Meta tag keywords</label>
                            <textarea class="form-control" name="metakeywords" id="exampleFormControlTextarea1" rows="3">{{$products->meta_tag_key}} </textarea>
                        </div>
                    </div>
                </div> <!-- Closing the .row div here -->

                <div class="form-group">
                    <label for="exampleFormControlInput1">SEO url</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="seourl" placeholder="" value="{{$products->seo_url}}">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Dynamic Script for Head tag</label>
                    <textarea class="form-control" name="scripthead" id="exampleFormControlTextarea1" rows="3">{{$products->dynamic_head}}</textarea>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Dynamic Script for Body tag</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" name="scriptBody" rows="3">{{$products->dynamic_body}}</textarea>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="exampleFormControlInput1">Footer Description</label>
            <textarea class="form-control editor1" name="footerdescription" rows="3">{{$products->footer_desc}} </textarea>
        </div>


        <div class="form-group">
            <label>Inquiry form </label>
                <div class="form-check ">
                    <input class="form-check-input" type="radio" name="inquiry" id="inlineRadio1" value="1" @if($products->inquiry == 1) checked @endif>
                    <label class="form-check-label" for="inlineRadio1"> Show </label>
                </div>
                <div class="form-check ">
                    <input class="form-check-input" type="radio" name="inquiry" id="inlineRadio2" value="0" @if($products->inquiry == 0) checked @endif>
                    <label class="form-check-label" for="inlineRadio2">Hide</label>
                </div>
        </div>

        <div class="form-group">
            <label>Show Navigation </label>
            
            <div class="form-check">
                <input class="form-check-input" type="radio" name="navigation" id="exampleRadios1" value="1" @if($products->navigation == 1) checked @endif>
                <label class="form-check-label" for="exampleRadios1">
                    Show
                </label>
                </div>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="navigation" id="exampleRadios2" value="0" @if($products->navigation == 0) checked @endif>
                <label class="form-check-label" for="exampleRadios2">
                    Hide
                </label>
            </div>
        </div>

        <div class="form-group">
            <label>Topics </label>
            <div class="form-check ">
                <input class="form-check-input" type="radio" name="topices" id="topics1" value="1" @if($products->topices == 1) checked @endif>
                <label class="form-check-label" for="topics1">
                    SHow
                </label>
                </div>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="topices" id="topics2" value="0" @if($products->topices == 0) checked @endif>
                <label class="form-check-label" for="topics2">
                    Hide
                </label>
            </div>

        </div>

        <button type="submit" class="btn btn-primary">Save </button>
    </form>
</div>

   

<!-- Modal -->
 
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Add Faq</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" action="{{route('faq.save')}}">
        @csrf
        <input type="hidden" name="product_id" value="{{$products->id}}">
            <div class="form-group">
                <label for="exampleInputEmail1"> Question Title</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="faqtitle" required> 
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Answer title</label>
                <textarea class="form-control editor1" name="footerdescription" rows="3"> </textarea>
            </div>
           
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<!-- addPageContent -->


<div class="modal fade" id="addPageContent" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="addPageContentLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addPageContentLabel">Add page content</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" action="{{ route('pagecontent.save') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="product_id" value="{{$products->id}}">
            
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1"> Upload Image</label>
                        <input type="file" name="pageImage" >
                    </div>
                </div>
               
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1"> Video Link</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="videoLink" >
                    </div>
                </div>
                 <div class="col-md-12">
                    <div class="form-group">
                        <label for="exampleInputEmail1"> Title</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="titlename" >
                    </div>
                </div>

            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Description</label>
                <textarea class="form-control editor1" name="description" rows="3"> </textarea>
            </div>
           
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<!-- customKeywordPopop -->

<div class="modal fade" id="customKeywordPopop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="addPageContentLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addPageContentLabel"> Custom Keyword </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" action="{{ route('keywords.save') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="product_id" value="{{$products->id}}">
            
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1"> Keyword</label>
                        <input type="text" class="form-control" name="keywordName" required>
                    </div>
                </div>
               
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1"> Keyword Url </label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="keywordUrl" required>
                    </div>
                </div>

            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<!-- customAdd -->

<div class="modal fade" id="customAdd" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="addPageContentLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addPageContentLabel"> Custom Adds    </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" action="{{ route('customadd.save') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="product_id" value="{{$products->id}}">
            
            <div class="row">

            <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1"> Adds image</label>
                        <input type="file" class="form-control" name="pageImage" >
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1"> Adds Name</label>
                        <input type="text" class="form-control" name="addsName" required>
                    </div>
                </div>
               
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1"> Adds  Url </label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="addUrl" required>
                    </div>
                </div>

            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



<!-- edit page content -->

<div class="modal fade" id="editPageContent" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="addPageContentLabelEdit" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addPageContentLabelEdit">Edit page content</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" action="{{ route('pagecontent.edit') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="product_id" value="{{$products->id}}">
        <input type="hidden" name="pagecontent_id" value="">
            
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1"> Upload Image</label>
                        <input type="file" name="pageImage" >
                    </div>
                    <!-- <a class="btn btn-primary deleteimage" href="#"  role="button">Delete image </a> -->
                </div>
               
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1"> Video Link</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="videoLink" >
                    </div>
                </div>
                
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="exampleInputEmail1"> Title</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="titlename" >
                    </div>
                </div>

            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Description</label>
                <textarea class="form-control editor1" id="editPageContentdesc" name="description" rows="3"> </textarea>
            </div>
           
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
      
    </div>
  </div>
</div>



<!--faq edit modal -->
<div class="modal fade" id="faqeditmodal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="faqeditmodalLabel" aria-hidden="true" role="dialog">
    
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="faqeditmodalLabel">Edit faq</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="{{route('faq.update')}}">
        @csrf
        <input type="hidden" name="faqedit_id" >
            <div class="form-group">
                <label for="exampleInputEmail1"> Question Title</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="faqtitle" required> 
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Answer title</label>
                <textarea class="form-control editor1" name="footerdescription" id="faqeditmodaledit" rows="3"> </textarea>
            </div>
           
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
      </div>
      
    </div>
  </div>
</div>




<!-- edit keywords popup -->


<!-- customKeywordPopop -->

<div class="modal fade" id="EditcustomKeywordPopop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="addPageContentLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addPageContentLabel"> Custom Keyword </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" action="{{ route('keywords.update') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="keyword_id" value="">
            
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1"> Keyword</label>
                        <input type="text" class="form-control" name="keywordName" required>
                    </div>
                </div>
               
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1"> Keyword Url </label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="keywordUrl" required>
                    </div>
                </div>

            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
      
    </div>
  </div>
</div>



<!-- edit custom adds -->

<div class="modal fade" id="EdircustomAdds" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="addPageContentLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addPageContentLabel"> Custom Adds    </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" action="{{ route('customadd.update') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="customEditId" value="">
            
            <div class="row">

            <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1"> Adds image</label>
                        <input type="file" class="form-control" name="pageImage" >
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1"> Adds Name</label>
                        <input type="text" class="form-control" name="addsName" required>
                    </div>
                </div>
               
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1"> Adds  Url </label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="addUrl" required>
                    </div>
                </div>

            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
     
    </div>
  </div>
</div>


<!-- addPageCardModal -->
<div class="modal fade" id="addPageCardModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="addPageContentLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addPageContentLabel"> Add page card </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" action="{{ route('save.pageCard') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="product_id" value="{{$products->id}}">
            
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1"> Keyword</label>
                        <input type="text" class="form-control" name="keywordName" required>
                    </div>
                </div>
               
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1"> Keyword Url </label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="keywordUrl" required>
                    </div>
                </div>

            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>


<!-- edit page card -->

<div class="modal fade" id="editPageCardModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="addPageContentLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addPageContentLabel"> Edit page card </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" action="{{ route('update.pageCard') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="editPagecardId" value="">
            
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1"> Keyword</label>
                        <input type="text" class="form-control" name="keywordName" required>
                    </div>
                </div>
               
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1"> Keyword Url </label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="keywordUrl" required>
                    </div>
                </div>

            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
   CKEDITOR.replaceAll('editor1'); 
</script>

<script>
    
    function getsubcategroy(id){

        axios({
            method: 'get',
            url: "{{ env('APP_URL') }}/sub-categories/"+id,
            data: {
                id: 'Fred',
                lastName: 'Flintstone'
            }
        }).then(function (response) {
            console.log(response.data.data);

            var html=''
               html = '<option value=""> None </option>'
               response.data.data.forEach(category => {
                    html += ` <option value="${category.id}"> ${category.name } </option>`
               });

               document.getElementById('subcategory').innerHTML = html;
              
        });       
    }
    
    function getsubsubcategroy(id){
        let catid = document.getElementById("subcategory").value;
        console.log(catid);
        
        axios({
            method: 'get',
            url: "{{ env('APP_URL') }}/api/sub-sub-category/"+id,
            data: {
                id: id
                
            }
        }).then(function (response) {
            console.log(response.data.data);

            var html=''
               html = '<option value=""> None </option>'
               response.data.data.forEach(category => {
                    html += ` <option value="${category.id}"> ${category.name } </option>`
               });

               document.getElementById('subSubcategory').innerHTML = html;
              
        });
    }
    
    function editpageContent(id){
        // alert(id);
            CKEDITOR.instances['editPageContentdesc'];
        axios({
            method: 'get',
            url: "{{ env('APP_URL') }}/get-faq/"+id,
            data: {
                id: id
            }
        }).then(function (response) {
            console.log(response.data.data);

            CKEDITOR.instances['editPageContentdesc'].setData(response.data.data.description);
            $('#editPageContent input[name=videoLink]').val(response.data.data.url);
            $('#editPageContent input[name=titlename]').val(response.data.data.product_title);
            $('#editPageContent input[name=pagecontent_id]').val(id);
            // $('#editPageContent .deleteimage').attr('href', '/delete-page-image/'+id);

            // 
            $('#editPageContent').modal('show');

        });
    }
        
    function editfaq(id){
         CKEDITOR.instances['faqeditmodaledit'];
         axios({
            method: 'get',
            url: "{{ env('APP_URL') }}/get-faq-details/"+id,
            data: {
                id: id
            }
        }).then(function (response) {
            console.log(response.data.data);

            CKEDITOR.instances['faqeditmodaledit'].setData(response.data.data.description);

            $('#faqeditmodal input[name=faqtitle]').val(response.data.data.name);
            $('#faqeditmodal input[name=faqedit_id]').val(id);
            // 
            $('#faqeditmodal').modal('show');

        });
    }

    function editkeywords(id){
        
        axios({
            method: 'get',
            url: "{{ env('APP_URL') }}/get-keyword-details/"+id,
            data: {
                id: id
            }
        }).then(function (response) {

            $('#EditcustomKeywordPopop input[name=keywordName]').val(response.data.data.name);
            $('#EditcustomKeywordPopop input[name=keywordUrl]').val(response.data.data.link);
            $('#EditcustomKeywordPopop input[name=keyword_id]').val(id);

            $('#EditcustomKeywordPopop').modal('show');

        });

    }

    function editCustomAdds(id){

        axios({
            method: 'get',
            url: "{{ env('APP_URL') }}/get-custom-adds-details/"+id,
            data: {
                id: id
            }
        }).then(function (response) {

            $('#EdircustomAdds input[name=addsName]').val(response.data.data.add_name);
            $('#EdircustomAdds input[name=addUrl]').val(response.data.data.add_url);
            $('#EdircustomAdds input[name=customEditId]').val(id);

            $('#EdircustomAdds').modal('show');

        });
    }

    function editpagecard(id){

        axios({
            method: 'get',
            url: "{{ env('APP_URL') }}/get-page-card/"+id,
            data: {
                id: id
            }
        }).then(function (response) {

            $('#editPageCardModal input[name=keywordName]').val(response.data.data.keyword);
            $('#editPageCardModal input[name=keywordUrl]').val(response.data.data.url);
            $('#editPageCardModal input[name=editPagecardId]').val(id);

            $('#editPageCardModal').modal('show');

        });
    }
    


    $('.modal button.close').click(function() {
        $(this).parent().parent().parent().parent().modal('hide');
    });


</script>


@endsection
