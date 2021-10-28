<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use DiDom\Query;
use Illuminate\Http\Request;
use DiDom\Document;
use Inertia\Inertia;

class EmergencyRssController extends Controller
{
    const EMERGENCY_RSS_URL = "https://[REGION_ID].mchs.gov.ru/deyatelnost/press-centr/operativnaya-informaciya/shtormovye-i-ekstrennye-preduprezhdeniya/rss";

    /**
     * @throws \DiDom\Exceptions\InvalidSelectorException
     */
    public function index(Request $request, int $region_id)
    {
        $items = collect([]);
        $rss = new Document($this->rssUrlByRegionId($region_id), true, 'UTF-8', Document::TYPE_XML);

        foreach ($rss->find('item') as $item) {
            $title = $item->first('title')->text();
            $date = $item->first('pubDate')->text();
            $content = $item->first('//yandex:full-text', Query::TYPE_XPATH)->text();

            $items->push([
                'title' => $title,
                'date' => Carbon::create($date)->format("Y-m-d h:i:s"),
                'content' => $content,
            ]);
        }

        // FIXME: instead of subMonth() make a more flexible version
        $items = $items->where('date', '>', Carbon::today()->subMonth());

        return Inertia::render('App', compact('items'));
    }

    public function rssUrlByRegionId(int $region_id): string
    {
        return str_replace('[REGION_ID]', $region_id, self::EMERGENCY_RSS_URL);
    }
}
