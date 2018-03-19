<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\UploadTrait;
use App\City;
use App\Discovery;
use App\Service;
use App\Traveler;
use App\Trip;

class PanelController extends Controller
{
    use UploadTrait;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	return view('panel.index');
    }

    public function cityList()
    {
    	return view("panel.content.city.list")->with([
            "city" => City::all()
        ]);
    }

    public function cityNew()
    {
    	return view("panel.content.city.form");
    }

    public function cityEdit($id)
    {
        $city = City::where('id', $id)->first();
        if ($city->count() > 0)
        {
            return view("panel.content.city.form")->with([
                "city" => $city
            ]);
        }
        return redirect(route("panelCityList"))->with("message", "City not found");
    }

    public function cityAction(Request $request, $id = null)
    {
        if ($id != null)
        {
            $city = City::where("id", $id)->first();
            if ($city->count() > 0)
            {
                if ($request["name"] == "")
                {
                    City::destroy($id);
                    return redirect(route("panelCityList"))->with("message", "Delete City Success");
                } else {
                    $this->validate($request, [
                        'name' => 'required|string|max:50',
                        'title' => 'required|string|max:50',
                        'description', 'string',
                        'image_file' => 'mimes:jpeg,bmp,png,jpg',
                    ]);
                    /**  */
                    if ($request->image_file != null)
                    {
                        $request['img_url'] = basename($this->imageUploadName($request->image_file, "assets/default/img/upload", $request->image_file->getClientOriginalName()));
                    } else {
                        $request['img_url'] = $city->img_url;
                    }
                    /**  */
                    $city->update($request->all());
                    return redirect(route("panelCityList"))->with("message", "Edit City Success");
                }
            }
        } else {
            $this->validate($request, [
                'name' => 'required|string|max:50',
                'title' => 'required|string|max:50',
                'description', 'string',
                'image_file' => 'required|mimes:jpeg,bmp,png,jpg',
            ]);
            /**  */
            if ($request->image_file != null)
            {
                $request['img_url'] = basename($this->imageUploadName($request->image_file, "assets/default/img/upload", $request->image_file->getClientOriginalName()));
            }
            /**  */
            City::create($request->all());
            return redirect(route("panelCityList"))->with("message", "Success create new City");
        }
    }

    public function discoveryList()
    {
        return view("panel.content.discovery.list")->with([
            "discovery" => Discovery::all()
        ]);
    }

    public function discoveryNew()
    {
        return view("panel.content.discovery.form")->with([
            "city" => City::all()
        ]);
    }

    public function discoveryEdit($id)
    {
        $discovery = Discovery::where('id', $id)->first();
        if ($discovery->count() > 0)
        {
            return view("panel.content.discovery.form")->with([
                "city" => City::all(),
                "discovery" => $discovery
            ]);
        }
        return redirect(route("panelDiscoveryList"))->with("message", "Discovery not found");
    }

    public function discoveryAction(Request $request, $id = null)
    {
        if ($id != null)
        {
            $discovery = Discovery::where("id", $id)->first();
            if ($discovery->count() > 0)
            {
                if ($request["name"] == "")
                {
                    Discovery::destroy($id);
                    return redirect(route("panelDiscoveryList"))->with("message", "Delete Discovery Success");
                } else {
                    $this->validate($request, [
                        'city_id' => 'required|string|max:50',
                        'name' => 'required|string|max:50',
                        'tags' => 'required|string|max:200',
                        'description' => 'string',
                    // 'photos' => 'string',
                        'image_file' => 'mimes:jpeg,bmp,png,jpg',
                    ]);
                    /**  */
                    if ($request->image_file != null)
                    {
                        $request['img_url'] = basename($this->imageUploadName($request->image_file, "assets/default/img/upload", $request->image_file->getClientOriginalName()));
                    } else {
                        $request['img_url'] = $discovery->img_url;
                    }
                    /**  */
                    $discovery->update($request->all());
                    return redirect(route("panelDiscoveryList"))->with("message", "Edit Discovery Success");
                }
            }
        } else {
            $this->validate($request, [
                'city_id' => 'required|string|max:50',
                'name' => 'required|string|max:50',
                'tags' => 'required|string|max:200',
                'description' => 'string',
                // 'photos' => 'string',
                'image_file' => 'required|mimes:jpeg,bmp,png,jpg',
            ]);
            /**  */
            if ($request->image_file != null)
            {
                $request['img_url'] = basename($this->imageUploadName($request->image_file, "assets/default/img/upload", $request->image_file->getClientOriginalName()));
            }
            /**  */
            Discovery::create($request->all());
            return redirect(route("panelDiscoveryList"))->with("message", "Success create new Discovery");
        }
    }

    public function serviceList()
    {
        return view("panel.content.service.list")->with([
            "service" => Service::all()
        ]);
    }

    public function serviceNew()
    {
        return view("panel.content.service.form");
    }

    public function serviceEdit($id)
    {
        $service = Service::where('id', $id)->first();
        if ($service->count() > 0)
        {
            return view("panel.content.service.form")->with([
                "city" => City::all(),
                "service" => $service
            ]);
        }
        return redirect(route("panelServiceList"))->with("message", "Service not found");
    }

    public function serviceAction(Request $request, $id = null)
    {
        if ($id != null)
        {
            $service = Service::where("id", $id)->first();
            if ($service->count() > 0)
            {
                if ($request["name"] == "")
                {
                    Service::destroy($id);
                    return redirect(route("panelServiceList"))->with("message", "Success delete Service");
                } else {
                    $this->validate($request, [
                        "name" => "required|string|max:50",
                        "type" => "required|string|max:25",
                        "options" => "required|string",
                        "about" => "required|string",
                        "address" => "required|string",
                        "location" => "required",
                        "image_file" => "mimes:jpeg,bmp,png,jpg",
                    ]);
                    /**  */
                    if ($request->image_file != null)
                    {
                        $request['img_url'] = basename($this->imageUploadName($request->image_file, "assets/default/img/upload", $request->image_file->getClientOriginalName()));
                    } else {
                        $request["img_url"] = $service->img_url;
                    }
                    $request["location"] = json_encode($request["location"]);
                    $service->update($request->all());
                    return redirect(route("panelServiceList"))->with("message", "Edit Service Success");
                }
            }
        } else {
            $this->validate($request, [
                "name" => "required|string|max:50",
                "type" => "required|string|max:25",
                "options" => "required|string",
                "about" => "required|string",
                "address" => "required|string",
                "location" => "required",
                "image_file" => "required|mimes:jpeg,bmp,png,jpg",
            ]);
            /**  */
            if ($request->image_file != null)
            {
                $request['img_url'] = basename($this->imageUploadName($request->image_file, "assets/default/img/upload", $request->image_file->getClientOriginalName()));
            }
            $request["location"] = json_encode($request["location"]);
            Service::create($request->all());
            return redirect(route("panelServiceList"))->with("message", "Success create new Service");
        }
    }

    public function travelerList()
    {
        return view("panel.content.traveler.list")->with([
            "traveler" => Traveler::all()
        ]);
    }

    public function travelerEdit($id)
    {
        $traveler = Traveler::where("id", $id)->first();
        if ($traveler->count() > 0)
        {
            return view("panel.content.traveler.form")->with([
                "traveler" => $traveler
            ]);
        }
        return redirect(route("panelTravelerList"))->with("message", "Traveler not found");
    }

    public function travelerNew()
    {
        return view("panel.content.traveler.form");
    }

    public function travelerAction(Request $request, $id = null)
    {
        if ($id != null)
        {
            $traveler = Traveler::where("id", $id)->first();
            if ($traveler->count() > 0)
            {
                if ($request["name"] == "")
                {
                    Traveler::destroy($id);
                    return redirect(route("panelTravelerList"))->with("message", "Success Delete Traveler");
                } else {
                    $this->validate($request, [
                        "name" => "required|string|max:50",
                        "status" => "required|string|max:25",
                        "image_file" => "mimes:jpeg,bmp,png,jpg"
                    ]);
                    /**  */
                    if ($request->image_file != null)
                    {
                        $request['img_url'] = basename($this->imageUploadName($request->image_file, "assets/default/img/upload", $request->image_file->getClientOriginalName()));
                    } else {
                        $request["img_url"] = $traveler->img_url;
                    }
                    /**  */
                    $traveler->update($request->all());
                    return redirect(route("panelTravelerList"))->with("message", "Success Update Traveler");
                }
            }
        } else {
            $this->validate($request, [
                "name" => "required|string|max:50",
                "status" => "required|string|max:25",
                "image_file" => "required|mimes:jpeg,bmp,png,jpg"
            ]);
            /**  */
            if ($request->image_file != null)
            {
                $request['img_url'] = basename($this->imageUploadName($request->image_file, "assets/default/img/upload", $request->image_file->getClientOriginalName()));
            }
            /**  */
            Traveler::create($request->all());
            return redirect(route("panelTravelerList"))->with("message", "Success Create Traveler");
        }
    }

    public function tripList()
    {
        return view("panel.content.trip.list")->with([
            "trip" => Trip::all()
        ]);
    }

    public function tripNew()
    {
        return view("panel.content.trip.form")->with([
            "city" => City::all()
        ]);
    }

    public function tripEdit($id)
    {
        $trip = Trip::where("id", $id)->first();
        if ($trip->count() > 0)
        {
            return view("panel.content.trip.form")->with([
                "city" => City::all(),
                "trip" => $trip
            ]);
        }
        return redirect(route("panelTripList"))->with("message", "Trip not found");
    }

    public function tripAction(Request $request, $id = null)
    {
        if ($id != null)
        {
            $trip = Trip::where("id", $id)->first();
            if ($trip->count() > 0)
            {
                if ($request["name"] == "")
                {
                    Trip::destroy($id);
                    return redirect(route("panelTravelerList"))->with("message", "Success Delete Traveler");
                } else {
                    $this->validate($request, [
                        'city_id' => 'required|string|max:50',
                        'name' => 'required|string|max:50',
                        'tags' => 'required|string|max:200',
                        'description' => 'string',
                        'stories' => 'string',
                        // 'image_file' => 'mimes:jpeg,bmp,png,jpg',
                    ]);
                    /**  */
                    // if ($request->image_file != null)
                    // {
                        // $request['img_url'] = basename($this->imageUploadName($request->image_file, "assets/default/img/upload", $request->image_file->getClientOriginalName()));
                    // } else {
                        // $request["img_url"] = $trip->img_url;
                    // }
                    /**  */
                    $trip->update($request->all());
                    return redirect(route("panelTripList"))->with("message", "Success Update Trip");
                }
            }
        } else {
            $this->validate($request, [
                'city_id' => 'required|string|max:50',
                'name' => 'required|string|max:50',
                'tags' => 'required|string|max:200',
                'description' => 'required|string',
                'stories' => 'required|string',
                // 'image_file' => 'required|mimes:jpeg,bmp,png,jpg',
            ]);
            /**  */
            // if ($request->image_file != null)
            // {
                // $request['img_url'] = basename($this->imageUploadName($request->image_file, "assets/default/img/upload", $request->image_file->getClientOriginalName()));
            // }
            /**  */
            Trip::create($request->all());
            return redirect(route("panelTripList"))->with("message", "Success create new Trip");

        }
    }

}
