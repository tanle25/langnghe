<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContentRequest as ContentRequest;
use App\Admin\Section;
use App\Admin\Content;
use Session;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $objs = Content::all();
        return view('back-end.content.list',['data'=>$objs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sections = Section::where('status',1)->get();
        return view('back-end.content.create',['sections'=>$sections]);
    }

    public function createHTML($section){
        $contents = $section->contents()->where('status',1)->orderby('pos')->get();
        $html = "";
       
        if($section->type == 1){
            $html .='<div class="row title-text">
                        <div class="col col-title-text col-sm-12 large-12">
                            <div class="col-inner">
                                <h2 class="h2 text-center">'.$section->name.'</span></h2>
                                <p><img class="header-bottom-line" src="'.asset('front-end/images/styled-line.png').'" alt=""></p>
                            </div>
                        </div>
                    </div>';
            $html .='<div class="row">
                        <div class="col left col-md-6 col-sm-12 col-lg-6">
                            <div class="col-inner">
                                <div class="img has-hover x md-x lg-x y md-y lg-y">
                                    <div class="img-inner dark">
                                        <img width="720" height="503" src="'.$section->image.'" class="attachment-large size-large" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>';
            $html .='<div class="col right col-md-6 col-sm-12 col-lg-6">
                        <div class="col-inner">';
            foreach($contents as $content){
                $html .='<div class="icon-box featured-box icon-box-left text-left is-small">
                            <div class="icon-box-img" style="width: 52px">
                                <div class="icon">
                                    <div class="icon-inner">
                                        <img width="200" height="200" src="'.$content->image.'" class="attachment-medium size-medium" sizes="(max-width: 200px) 100vw, 200px"> 
                                    </div>
                                </div>
                            </div>
                            <div class="icon-box-text last-reset">
                                <h3>'.$content->name.'</h3>
                                <p>'.$content->des_f.'</p>
                            </div>
                        </div>';
            }
            $html .= '</div></div></div>';
        }

        if($section->type == 2){
            $html .='<section class="section technology">
                        <div class="section-content relative container">
                            <div class="row title-text">
                                <div class="col col-title-text col-sm-12 col-lg-12">
                                    <div class="col-inner">
                                        <h2 class="h2 text-center"><span class="hihiweb">'.$section->name.'</h2>
                                        <img class="header-bottom-line" src="'.asset('front-end/images/styled-line.png').'" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">';
                                
            $i = 0;
            $html .='<div class="col left col-md-4 col-sm-12 col-lg-4">
                        <div class="col-inner">';
            foreach($contents as $content){
               
                if($i % 2 == 0){
                    $html .='<div class="technology-item wordpress">
                                <p class="manhphuc-title-cn"><i class="fa fa-wordpress" aria-hidden="true"></i>'.$content->name.'</p>
                                '.$content->des_f.'
                            </div>';
                }
                $i++;
            }
            $html .= '</div></div>';
            $html .= '<div class="col col-md-4 col-sm-12 col-lg-4">
                        <div class="col-inner">
                            <div class="img has-hover">
                                <div class="img-inner dark">
                                    <img width="526" height="604" src="'.$section->image.'">
                                </div>
                            </div>
                        </div>
                    </div>';
            $i = 0;
            $html .='<div class="col right col-md-4 col-sm-12 col-lg-4">
                        <div class="col-inner">';
            foreach($contents as $content){
               
                if($i % 2 != 0){
                    $html .='<div class="technology-item wordpress">
                                <p class="manhphuc-title-cn"><i class="fa fa-wordpress" aria-hidden="true"></i>'.$content->name.'</p>
                                '.$content->des_f.'
                            </div>';
                }
                $i++;
            }
            $html .= '</div></div>';
            $html .= '</div></div></section>';
        }

        if($section->type == 3){
            $html .='<section class="reason-home">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 reason-title bold-text">'.$section->name.'</div>
                                <img class="header-bottom-line" src="'.asset('front-end/images/styled-line.png').'" alt="">
                                <div class="col-md-12 no-padding reason-content" role="tabpanel">';
            $html .='<div class="col-md-5 reason-tab">';
            $i = 0;
            foreach($contents as $content){
                if ($i == 0) $cla = 'active';
                else $cla = '';
                $html .='<div class="col-md-24 no-padding tab-item '.$cla.'">
                            <div href="#tab'.$content->id.'" class="title-item effect-button-left-right" data-toggle="tab"> 
                            '.$content->name.'
                            </div>
                            <p></p>
                            <div class="horizontal-line-item"></div>
                        </div>';
                $i++;
            }
            $html .= "</div>";
            $i = 0;
            $html .='<div class="col-md-7 no-padding reason-tab-content tab-content">';
            foreach($contents as $content){
                if ($i == 0) $cla = 'active';
                else $cla = '';
                $html .='<div id="tab'.$content->id.'" class="col-md-24 no-padding tab-content-item tab-pane '.$cla.'">
                            <div class="col-md-24 image-item">
                                <img src="'.$content->image.'" alt="'.$content->name.'" class="img-responsive">
                            </div>
                            <div class="col-md-24 text-item">
                                <div class="horizontal-line-item"></div>
                                <div class="title-item">'.$content->name.'</div>
                                <div class="subtitle-item">'.$content->des_f.'</div>
                            </div>
                        </div>';
                $i++;
            }
            $html .= "</div>";
            $html .= "</div></div></div></section>";  
        }

        if($section->type == 4){
            $html .='<section class="list-icon section text-contrast advanced-automation-solution overflow-hidden">
                        <div class="shape-wrapper">
                            <div class="shape shape-background mountain top shape-left"></div>
                        </div>
                        <div class="container">
                            <div class="section-heading mb-6 text-center">
                                <h5 class="accent bold small text-uppercase text-light">'.$section->des_s.'</h5>
                                <h2 class="text-light">'.$section->name.'</h2>
                                <img class="header-bottom-line" src="'.asset('front-end/images/styled-line.png').'" alt="">
                            </div>
                            <div class="row gap-y text-center text-md-left">';
            foreach($contents as $content){
                $html .='<a class="col-md-3 col-6 py-4 rounded shadow-hover text-center aos-init aos-animate" data-aos="fade-right" 
                        href="'.$content->link.'" title="'.$content->name.'">
                            <div class="icon-shape mb-4">
                                <img class="shape-xl" src="'.$content->image.'" alt="'.$content->name.'">
                            </div>
                            <h3 class="font-l text-capitalize"><span class="text-body">'.$content->name.'</span></h3>
                        </a>';
            }
            $html .='</div></div></section>';
        }

        if($section->type == 5){
            $html .='<div class="section" id="main-customers-say">
                        <div id="main-customers-say-grid-bg"></div>
                        <div class="container">
                            <div class="section-header text-center">
                                <h4 class="section-title">'.$section->name.'</h4>
                                <img class="header-bottom-line" src="'.asset('front-end/images/styled-line.png').'" alt="">
                                <p class="text-center section-sub-title">'.$section->des_f.'
                                </p>
                            </div>
                            <div class="section-content">
                                <ul class="cmt-slider">';
            foreach($contents as $content){
                $html .='<div class="customers-say clearfix">
                            <img width="90" height="90" src="'.$content->image.'" class="attachment-full size-full wp-post-image" alt="tuan-bui-thiet-ke-web">  
                            <div class="name">
                                '.$content->name.'
                            </div>
                            <div class="say">
                                '.$content->des_f.'
                            </div>
                        </div>';
            }
            $html .='</ul></div></div></div>';
        }

        if($section->type == 6){
            $html .='<div class="section banner" id="main-banner">
                        <div class="container text-center">
                            <h2 class="title">'.$section->name.'</h2>
                            <h3 class="sub-title">'.$section->des_f.'</h3>
                            <a data-toggle="modal" data-target="#myModal" class="btn btn-default project-btn">LIÊN HỆ NGAY</a>
                        </div>
                    </div>';
        }

        if($section->type == 8){
            $html .='<div class="section" id="main-blog">
                        <div class="container">
                            <div class="section-header text-center">
                                <h2 class="section-title">'.$section->name.'</h2>
                                <img class="header-bottom-line" src="'.asset('front-end/images/styled-line.png').'" alt="">
                                <p class="text-center section-sub-title">'.$section->des_f.'</p>
                            </div>
                            <div class="section-content">
                                <div class="row">';
            foreach($contents as $content){
                $html .='<div class="col-md-6 col-sm-12 col-xs-12 col">
                            <div class="clearfix small-thumbnail-left home-post">
                                <a class="post-thumbnail" href="'.$content->link.'" title="'.$content->name.'">
                                    <figure><img width="200" height="125" src="'.$content->image.'" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="'.$content->name.'"></figure>
                                </a>
                                <a class="post-title" href="'.$content->link.'" rel="bookmark" title="'.$content->name.'">
                                               '.$content->name.'
                                </a>
                                <div class="post-meta">
                                   
                                </div>
                                <div class="post-excerpt">'.$content->des_f.'</div>
                            </div>
                        </div>';
            }
            $html .='</div></div></div></div>';
        }

        if($section->type == 9){
            $html .='<div class="introduce">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6">
                                    <img src="'.$section->image.'" alt="'.$section->name.'" class="show">
                                </div>
                                <div class="col-lg-6">
                                    <h2>'.$section->name.'</h2>
                                    <ul>';
            foreach($contents as $content){
                $html .='<li>'.$content->des_f.'</li>';
            }
            $html .='</ul></div></div>';
            $html .='<div class="text-tablet d-none d-lg-block d-xl-none">'.$section->des_f.'</div></div></div>';
        }

        if($section->type == 10){
            $html   .='<div class="field">
                        <div class="container">
                            <h2>'.$section->name.'</h2>
                            <p>'.$section->des_f.'</p>
                            <ul class="row">';
            foreach($contents as $content){
                $html   .= '<li class="col-lg-6 col-12 d-flex align-items-start field-'.$content->id.'">
                                <span class="icon" onclick="window.location.href='.$content->link.'"></span>
                                <div>
                                    <h3><a href="'.$content->link.'">'.$content->name.'</a></h3>
                                        '.$content->des_f.'
                                </div>
                            </li>';
            }
            $html .='</ul></div></div>';
        }

        if($section->type == 11){
            $html   .=  '<div class="banner text-center">
                            <div class="container">
                                <h1>'.$section->name.'</h1>
                                '.$section->des_f.'
                            </div>
                        </div>';
            foreach($contents as $content){
                $html   .= '<div class="packages text-center">
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="col-xl-10 col-12">
                                            <div class="item">
                                                <div class="name-price">
                                                    <h2>'.$content->name.'</h2>
                                                    '.$content->des_s.'
                                                    <a data-toggle="modal" data-target="#myModal" class="btn-registration">LIÊN HỆ</a>
                                                </div>
                                                <div class="info">
                                                    <div>
                                                        '.$content->des_f.'
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>';
            }
        }

        if($section->type == 12){
            $html   .=  '<div class="faq">
                            <div class="container">
                                <h2>'.$section->name.'</h2>
                                <div class="row justify-content-center">
                                    <div class="col-xl-10">';
            $i = 1;
            foreach($contents as $content){
                $html   .= '<div class="question">
                                <h4 data-number="'.$i.'.">'.$content->name.'<i class="fa fa-angle-down"></i></h4>
                                '.$content->des_f.'
                            </div>';
                $i++;
            }
            $html .= '</div></div></div></div>';
        }
        $section->update(['html'=>$html]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContentRequest $request)
    {
        $arr_data = $request->all();
        $section = Section::find($request->section_id);
        if($section == null) abort(404);
        $arr_data['created_by'] = \Auth::user()->id;
        Content::create($arr_data);
        $this->createHTML($section);
       
        Session::flash('success-content', 'Tạo mới content thành công.');
        return redirect(route('content.create'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $obj = Content::find($id);
        if($obj == null){
            Session::flash('error-content', 'Không tìm thấy dữ liệu.');  
            return redirect()->route('content.index');  
        }
        $sections = Section::where('status',1)->get();
        return view('back-end.content.edit',['obj'=>$obj, 'sections'=>$sections]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ContentRequest $request, $id)
    {
        $obj = Content::find($id);
        if($obj == null){
            Session::flash('error-content', 'Không tìm thấy dữ liệu.');  
            return redirect()->route('content.index');  
        }
        $arr_data = $request->all();
        $arr_data['created_by'] = \Auth::user()->id;
        $section = Section::find($request->section_id);
        if($section == null) abort(404);
        $obj->update($arr_data);
        $this->createHTML($section);
        Session::flash('success-content', 'Thay đổi thông tin thành công.');
        return redirect(route('content.edit', ['id' => $id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $obj = Content::find($id);
        if($obj == null){
            Session::flash('error-content', 'Không tìm thấy dữ liệu.');  
            return redirect()->route('content.index');  
        }
        $obj->delete();
        Session::flash('success-content', 'Xóa thông tin thành công.');  
        return redirect()->route('content.index');  
    }

    public function mutileUpdate(Request $request)
    {
        $status = $request->status;
        $data = $request->data_selected;
        $data = explode(",", $data[0]);
        if($status != 2)
        {
            for($i = 0; $i < sizeof($data); $i++)
            {
                $obj = Content::find($data[$i]);
                if($obj != null)
                {
                    $obj->status = $status;
                    $obj->update();
                }
            }
        }else{
            for($i = 0; $i < sizeof($data); $i++)
            {
                $obj = Content::find($data[$i]);
                if($obj != null)
                {
                    $obj->delete();
                }
            }
        }       
        Session::flash('success-content', 'Update đồng loạt thành công.');
        return redirect()->route('content.index');
    }
}
