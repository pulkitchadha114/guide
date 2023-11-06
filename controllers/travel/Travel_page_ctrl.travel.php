<?php
class Travel_page_ctrl extends Main_ctrl
{
    public function index($req=null)
    {
        $req = obj($req);
        $slug = $req->slug;
        $db = new Dbobjects;
        $db->tableName = 'content';
        $page = $db->get(['slug'=>$slug]);
        if (!$page) {
            header("Location:/".home.route('home'));
            exit;
        }
        $page = (object)$page;
        $meta_tags = "";
        $meta_desc = "";
        if ($page->json_obj != "") {
            $jsn = json_decode($page->json_obj);
            if (isset($jsn->meta->tags)) {
                $meta_tags = $jsn->meta->tags;
            }
            if (isset($jsn->meta->description)) {
                $meta_desc = $jsn->meta->description;
            }
        }
        $GLOBALS['meta_seo'] = (object) array('title' => $page->title, 'description' => $meta_desc, 'keywords' => $meta_tags);
        $context = (object) array(
            'page'=>'page.php',
            'data' => (object) array(
                'req' => obj($req),
                'id' => $page->id,
                'title' => $page->title,
                'title_ru' => $page->title_ru,
                'content' => $page->content,
                'content_ru' => $page->content_ru,
                'banner' => $page->banner,
                'imgs' => $page->imgs,
                'days' => $page->days,
                'max_people' => $page->max_people,
                'min_age' => $page->min_age,
                'pickup' => $page->pickup,
                'pickup_ru' => $page->pickup_ru,
                'price' => $page->price,
                'languages' => $page->languages,
                'languages_ru' => $page->languages_ru,
            )
        );
        $this->render_layout($context);
    }
}
