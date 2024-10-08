@extends('layouts.app')

@section('content')

@if(Session::has('message'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif


<div class="card mb-4 col-md-12">
    <form action="{{route('home.update')}}" enctype="multipart/form-data" method="post">
        @csrf
        <div class="card-header">Information</div>
        <input type="hidden" name="page_id" value="{{$Homepage->id}}">
        <div class="card-body">

            <div class="form-group">
                <label for="exampleFormControlInput1">Page Name</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" value="{{$Homepage->page_name}}" required name="pageName" placeholder="name">
            </div>

            {{--
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Destop Image </label>
                        <input type="file" class="form-control"  name="destopImage" placeholder="name">

                     <img src="{{ asset('/public/images') }}/{{$Homepage->banner1}}" width="150px">

                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Mobile Image </label>
                        <input type="file" class="form-control"  name="mobileIMage" placeholder="name">
                        <img src="{{ asset('/public/images') }}/{{$Homepage->banner2}}" width="150px">

                    </div>
                </div>


                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Banner Title </label>
                        <input type="text" class="form-control"  name="bannerTitle" value="{{$Homepage->banner_title}}" placeholder="name">
                    </div>
                </div>
                
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Banner Url  </label>
                        <input type="text" class="form-control"  name="bannerUrl" value="{{$Homepage->banner_url}}">
                    </div>
                </div>


                <div class="col-md-12">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Description </label>
                        <textarea type="file" class="form-control"  name="description" > {{$Homepage->description}} </textarea>
                    </div>
                </div>

                --}}

            </div>
        </div>
        
       
         <!-- Banners content -->
         <div class="card bg-light mb-3">
            <div class="card-header">Banners</div>
            <div class="card-body">

            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddBannerssection"> Add Banner Content </button>

            <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Destop Image</th>
                    <th scope="col">Mobile Image</th>
                    <th scope="col">Title</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $count = 0
                    @endphp
                    @foreach($banners as $page)
                    
                    <tr>
                    <th scope="row">{{$page->id}}</th>
                    
                    <td> <img src="{{ asset('/public/images') }}/{{$page->destop}}" width="100px"> </td>
                    <td> <img src="{{ asset('/public/images') }}/{{$page->mobile}}" width="100px"> </td>
                    <td> {{$page->title}} </td>
                           
                    <td> 
                     <button type="button" class="btn btn-primary" onclick="editBannerContent({{$page->id }})" > <i class="fa fa-edit" aria-hidden="true"></i> </button>
                    
                    
                    <a href="{{route('Banners.delete', $page->id)}}"><i class="fa fa-trash" aria-hidden="true"></i> </a>
                    
                    </td>
                    </tr>
                @endforeach
                </tbody>
                </table>

              
            </div>
        </div>
        
        
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
                    
                    <td> <img src="{{ asset('/public/images') }}/{{$page->image}}" width="100px"> </td>
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
                    <input type="text" class="form-control" id="exampleFormControlInput1" value="{{$Homepage->faq_title}}" name="faqtitle" placeholder="">
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
                    <input type="text" class="form-control"  id="exampleFormControlInput1" value="{{$Homepage->keyword_title}}" name="customKeyword" placeholder="">
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
                    <input type="text" name="metatag" class="form-control" id="exampleFormControlInput1" value="{{$Homepage->meta_tag}}">
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Meta tag description</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="metadescription" rows="3">{{$Homepage->meta_desc}}</textarea>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Meta tag keywords</label>
                            <textarea class="form-control" name="metakeywords" id="exampleFormControlTextarea1" rows="3">{{$Homepage->meta_keywords}} </textarea>
                        </div>
                    </div>
                </div> <!-- Closing the .row div here -->

                <div class="form-group">
                    <label for="exampleFormControlInput1">SEO url</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="seourl" value="{{$Homepage->seo_url}}" >
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Dynamic Script for Head tag</label>
                    <textarea class="form-control" name="scripthead" id="exampleFormControlTextarea1" rows="3">{{$Homepage->head_tag}}</textarea>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Dynamic Script for Body tag</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" name="scriptBody" rows="3">{{$Homepage->body_tag}}</textarea>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="exampleFormControlInput1">Footer Description</label>
            <textarea class="form-control editor1" name="footerdescription" rows="3"> {{$Homepage->footer_desc}} </textarea>
        </div>

        <button type="submit" class="btn btn-primary"> Update </button>
    </form>
</div>



<!-- modals below -->
   
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
      <form method="post" action="{{route('faq.save')}}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="page_id" value="{{$Homepage->id}}">
            <div class="form-group">
                <label for="exampleInputEmail1"> Question Title</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="faqtitle" required> 
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Answer title</label>
                <textarea class="form-control editor1" name="addfooterdescription" rows="3"> </textarea>
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
        <input type="hidden" name="page_id" value="{{$Homepage->id}}">
            
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
                <textarea class="form-control editor1" name="description" rows="3" required> </textarea>
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
        <input type="hidden" name="page_id" value="{{$Homepage->id}}">
            
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
        <input type="hidden" name="page_id" value="{{$Homepage->id}}">
            
            <div class="row">

            <div class="col-md-12">
                    <div class="form-group">
                        <label for="exampleInputEmail1"> Adds image</label>
                        <input type="file" class="form-control" name="pageImage" required>
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
        <input type="hidden" name="page_id" value="{{$Homepage->id}}">
        <input type="hidden" name="pagecontent_id" value="">
            
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
                <textarea class="form-control editor1" id="editPageContentdesc" name="description" rows="3" required> </textarea>
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
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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


<!-- banners add modal -->

<div class="modal fade" id="AddBannerssection" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="addPageContentLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addPageContentLabel"> Add Banners    </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" action="{{ route('Banners.add') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="page_id" value="{{$Homepage->id}}">
            
            <div class="row">

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1"> Destop  image</label>
                        <input type="file" class="form-control" name="destopImage" >
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1"> Mobile Image</label>
                        <input type="file" class="form-control" name="mobileIMage" >
                    </div>
                </div>
               
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1"> Title </label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="title" required >
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1"> Link name </label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="name" >
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1"> Banner Url </label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="bannerUrl" >
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label for="exampleInputEmail1"> Description </label>
                        <textarea type="text" class="form-control" id="exampleInputEmail1" name="description" > </textarea>
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


<!-- edit banner details -->
<div class="modal fade" id="EditBannerCont" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="addPageContentLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addPageContentLabel"> Add Banners    </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" action="{{ route('Banners.update') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="banner_id" value="">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1"> Destop  image</label>
                        <input type="file" class="form-control" name="destopImage" >
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1"> Mobile Image</label>
                        <input type="file" class="form-control" name="mobileIMage" >
                    </div>
                </div>
               
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1"> Title </label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="title" required >
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1"> Link name </label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="name" >
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label for="exampleInputEmail1"> Banner Url </label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="bannerUrl" >
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label for="exampleInputEmail1"> Description </label>
                        <textarea type="text" class="form-control" id="exampleInputEmail1" name="description" > </textarea>
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
            // console.log(response.data.data);

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

    function editBannerContent(id){

        axios({
            method: 'get',
            url: "{{ env('APP_URL') }}/get-banner-details/"+id,
            data: {
                id: id
            }
        }).then(function (response) {

            $('#EditBannerCont input[name=name]').val(response.data.data.name);
            $('#EditBannerCont input[name=title]').val(response.data.data.title);
            $('#EditBannerCont input[name=bannerUrl]').val(response.data.data.url);
            $('#EditBannerCont textarea[name=description]').val(response.data.data.Description);
            $('#EditBannerCont input[name=banner_id]').val(id);

            $('#EditBannerCont').modal('show');

        });

    }
    $('.modal button.close').click(function() {
        $(this).parent().parent().parent().parent().modal('hide');
    });
    

</script>
@endsection