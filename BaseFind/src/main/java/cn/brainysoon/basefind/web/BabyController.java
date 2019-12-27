package cn.brainysoon.basefind.web;

import cn.brainysoon.basefind.Model.Baby;
import cn.brainysoon.basefind.service.BabyService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.bind.annotation.RestController;

import java.util.HashMap;
import java.util.List;
import java.util.Map;

/**
 * Created by brainy on 17-6-2.
 */
@RestController
@RequestMapping(value = "/")
public class BabyController {


    @Autowired
    private BabyService babyService;

    @RequestMapping(value = "findbaby", method = RequestMethod.GET)
    public List<Baby> findBaby(@RequestParam(value = "Long") Double Long,
                               @RequestParam(value = "Lat") Double Lat,
                               @RequestParam(value = "Circle") Double Circle,
    @RequestParam(value="BabyClass") String BabyClass ){

        return babyService.getBabysByLongLatAndCircle(Long, Lat, Circle,BabyClass);
    }

    @RequestMapping(value = "addbaby", method = RequestMethod.POST)
    public Map<String,Integer> addBaby(@RequestParam(value = "babyname") String babyname,
                       @RequestParam(value = "babyclass") String babyclass,
                       @RequestParam(value = "passsecret") String passsecret,
                       @RequestParam(value = "secretkey") String secretkey,
                       @RequestParam(value = "findphone") String findphone,
                       @RequestParam(value = "babylong") Double babylong,
                       @RequestParam(value = "babylat") Double babylat) {

        Map<String,Integer> map = new HashMap<String, Integer>();

        map.put("result", babyService.addBaby(babyname, babyclass, passsecret, secretkey, findphone, babylong, babylat));

        return map;
    }

}
