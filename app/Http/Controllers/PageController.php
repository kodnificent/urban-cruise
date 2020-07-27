<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function about(Request $request)
    {
        $description = "We are here to entertain you.To put you on cruise. We've got you covered on entertainment, Lifestyle, scoops, online brand promotions, Business and inspiration.";
        $meta = [
            'seo_title' => "About us | ".settings('site_name'),
            'seo_description' => $description,
            'seo_canonical' => route('about-us'),
            'title' => 'About us',
            'description' => $description,
        ];
        $res = compact('meta');

        return $this->respond($res, $request, 'layouts.pages.about-us');
    }

    public function contact(Request $request)
    {
        $description = "UrbanCruise connects brands with the best audience in entertainment and more. Whether its sponsored content, custom ad units, display lead acquisition or strategic partnerships.";
        $meta = [
            'seo_title' => "Contact us | ".settings('site_name'),
            'seo_description' => $description,
            'seo_canonical' => route('contact-us'),
            'title' => 'Contact us',
            'description' => $description,
        ];
        $res = compact('meta');

        return $this->respond($res, $request, 'layouts.pages.contact-us');
    }

    public function write(Request $request)
    {
        $description = "We are exited to hear about what you'd like to contribute to UrbanCruise. We will need a bit of info but this shouldn't take too long.";
        $meta = [
            'seo_title' => "Write for us | ".settings('site_name'),
            'seo_description' => $description,
            'seo_canonical' => route('write-for-us'),
            'title' => 'Write for us',
            'description' => $description,
        ];
        $res = compact('meta');

        return $this->respond($res, $request, 'layouts.pages.write-for-us');
    }

    public function terms(Request $request)
    {
        $description = "The words of which the initial letter is capitalized have meanings defined under the following conditions. The following definitions shall have the same meaning regardless of whether they appear in singular or in plural.";
        $meta = [
            'seo_title' => "Terms and Conditions | ".settings('site_name'),
            'seo_description' => $description,
            'seo_canonical' => route('terms'),
            'title' => 'Terms and Conditions',
            'description' => $description,
        ];
        $res = compact('meta');

        return $this->respond($res, $request, 'layouts.pages.terms-and-conditions');
    }

    public function disclaimer(Request $request)
    {
        $description = "The words of which the initial letter is capitalized have meanings defined under the following conditions.
        The following definitions shall have the same meaning regardless of whether they appear in singular or in plural.";
        $meta = [
            'seo_title' => "Disclaimer | ".settings('site_name'),
            'seo_description' => $description,
            'seo_canonical' => route('disclaimer'),
            'title' => 'Disclaimer',
            'description' => $description,
        ];
        $res = compact('meta');

        return $this->respond($res, $request, 'layouts.pages.disclaimer');
    }

    public function privacy(Request $request)
    {
        $description = "This Privacy Policy describes Our policies and procedures on the collection, use and disclosure of Your information when You use the Service and tells You about Your privacy rights and how the law protects You.";
        $meta = [
            'seo_title' => "Privacy Policy | ".settings('site_name'),
            'seo_description' => $description,
            'seo_canonical' => route('privacy'),
            'title' => 'Privacy Policy',
            'description' => $description,
        ];
        $res = compact('meta');

        return $this->respond($res, $request, 'layouts.pages.privacy-policy');
    }
}
