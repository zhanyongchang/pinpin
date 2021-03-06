﻿/**省市二级联动js用法：
<script type="text/javascript" src="/js/ProvinceCity.js"></script>
<span><select name="s1" id="s1" msg="请选择" style="width:80px;"><option></option></select></span>
<span id="vfMsgBox_Province"></span>

<span><select name="s2" id="s2" msg="请选择"><option></option></select></span>
<span id="vfMsgBox_City"></span>

<script type="text/javascript">AreasSetup('广东','东莞市');</script>
**/
function Dsy() {
    this.Items = {};
}
Dsy.prototype.add = function(id, iArray) {
    this.Items[id] = iArray;
}
Dsy.prototype.Exists = function(id) {
    if (typeof (this.Items[id]) == "undefined") return false;
    return true;
}
function change(v) {
    var str = "0";
    for (i = 0; i < v; i++) { str += ("_" + (document.getElementById(s[i]).selectedIndex - 1)); };
    var ss = document.getElementById(s[v]);
    with (ss) {
        length = 0;
        options[0] = new Option(opt0[v], opt0[v]);
        if (v && document.getElementById(s[v - 1]).selectedIndex > 0 || !v) {
            if (dsy.Exists(str)) {
                ar = dsy.Items[str];
                for (i = 0; i < ar.length; i++) options[length] = new Option(ar[i], ar[i]);
                if (v) options[1].selected = true;
            }
        }
        if (++v < s.length) { change(v); }
    }
}
var dsy = new Dsy();
dsy.add("0", ["北京", "天津", "上海", "重庆", "河北", "山西", "内蒙古", "辽宁", "吉林", "黑龙江", "江苏", "浙江", "安徽", "福建", "江西", "山东", "河南", "湖北", "湖南", "广东", "广西", "海南", "四川", "贵州", "云南", "西藏", "陕西", "甘肃", "青海", "宁夏", "新疆", "香港", "澳门", "台湾"]);
dsy.add("0_0", ["北京市", "东城区", "西城区", "海淀区", "朝阳区", "丰台区", "石景山区", "通州区", "顺义区", "房山区", "大兴区", "昌平区", "怀柔区", "平谷区", "门头沟区", "密云县", "延庆县"]);
dsy.add("0_1", ["天津市", "和平区", "河西区", "南开区", "河东区", "河北区", "红桥区", "东丽区", "津南区", "西青区", "北辰区", "滨海新区", "武清区", "宝坻区", "蓟县", "宁河县", "静海县"]);
dsy.add("0_2", ["上海市", "黄浦区", "徐汇区", "长宁区", "静安区", "普陀区", "闸北区", "虹口区", "杨浦区", "闵行区", "宝山区", "嘉定区", "浦东新区", "金山区", "松江区", "青浦区", "奉贤区", "崇明县"]);
dsy.add("0_3", ["重庆市", "万州区", "黔江区", "涪陵区", "渝中区", "大渡口区", "江北区", "沙坪坝区", "九龙坡区", "南岸区", "北碚区", "渝北区", "巴南区", "两江新区", "长寿区", "江津区", "合川区", "永川区", "南川区", "綦江区", "大足区", "潼南县", "铜梁县", "荣昌县", "璧山县", "梁平县", "城口县", "丰都县", "垫江县", "武隆县", "忠县", "开县", "云阳县", "奉节县", "巫山县", "巫溪县", "石柱土家族自治县", "秀山土家族苗族自治县", "酉阳土家族苗族自治县", "彭水苗族土家族自治县"]);
dsy.add("0_4", ["石家庄市", "唐山市", "秦皇岛市", "邯郸市", "邢台市", "保定市", "张家口市", "承德市", "沧州市", "廊坊市", "衡水市"]);
dsy.add("0_5", ["太原市", "大同市", "阳泉市", "长治市", "晋城市", "朔州市", "晋中市", "运城市", "忻州市", "临汾市", "吕梁市"]);
dsy.add("0_6", ["呼和浩特市", "包头市", "乌海市", "赤峰市", "通辽市", "鄂尔多斯市", "呼伦贝尔市", "巴彦淖尔市", "乌兰察布市", "兴安盟", "锡林郭勒盟", "阿拉善盟"]);
dsy.add("0_7", ["沈阳市", "大连市", "鞍山市", "抚顺市", "本溪市", "丹东市", "锦州市", "营口市", "阜新市", "辽阳市", "盘锦市", "铁岭市", "朝阳市", "葫芦岛市"]);
dsy.add("0_8", ["长春市", "吉林市", "四平市", "辽源市", "通化市", "白山市", "白城市", "松原市", "延边朝鲜族自治州"]);
dsy.add("0_9", ["哈尔滨市", "齐齐哈尔市", "牡丹江市", "佳木斯市", "大庆市", "伊春市", "鸡西市", "鹤岗市", "双鸭山市", "七台河市", "绥化市", "黑河市", "大兴安岭地区"]);
dsy.add("0_10", ["南京市", "无锡市", "徐州市", "常州市", "苏州市", "南通市", "连云港市", "淮安市", "盐城市", "扬州市", "镇江市", "泰州市", "宿迁市"]);
dsy.add("0_11", ["杭州市", "宁波市", "温州市", "绍兴市", "湖州市", "嘉兴市", "金华市", "衢州市", "舟山市", "台州市", "丽水市"]);
dsy.add("0_12", ["合肥市", "芜湖市", "蚌埠市", "马鞍山市", "安庆市", "淮南市", "铜陵市", "黄山市", "宣城市", "池州市", "滁州市", "淮北市", "阜阳市", "六安市", "宿州市", "亳州市"]);
dsy.add("0_13", ["福州市", "厦门市", "漳州市", "泉州市", "三明市", "莆田市", "南平市", "龙岩市", "宁德市", "平潭"]);
dsy.add("0_14", ["南昌市", "九江市", "上饶市", "抚州市", "宜春市", "吉安市", "赣州市", "景德镇市", "萍乡市", "新余市", "鹰潭市"]);
dsy.add("0_15", ["济南市", "青岛市", "淄博市", "枣庄市", "东营市", "烟台市", "潍坊市", "济宁市", "泰安市", "威海市", "日照市", "滨州市", "德州市", "聊城市", "临沂市", "菏泽市", "莱芜市"]);
dsy.add("0_16", ["郑州市", "开封市", "洛阳市", "平顶山市", "安阳市", "鹤壁市", "新乡市", "焦作市", "濮阳市", "许昌市", "漯河市", "三门峡市", "商丘市", "周口市", "驻马店市", "南阳市", "信阳市", "济源市"]);
dsy.add("0_17", ["武汉市", "黄石市", "十堰市", "荆州市", "宜昌市", "襄阳市", "鄂州市", "荆门市", "黄冈市", "孝感市", "咸宁市", "仙桃市", "潜江市", "天门市", "随州市", "神农架林区", "恩施土家族苗族自治州"]);
dsy.add("0_18", ["长沙市", "株洲市", "湘潭市", "衡阳市", "邵阳市", "岳阳市", "常德市", "张家界市", "益阳市", "娄底市", "郴州市", "永州市", "怀化市", "湘西土家族苗族自治州"]);
dsy.add("0_19", ["广州市", "深圳市", "珠海市", "汕头市", "佛山市", "韶关市", "湛江市", "肇庆市", "江门市", "茂名市", "惠州市", "梅州市", "汕尾市", "河源市", "阳江市", "清远市", "东莞市", "中山市", "潮州市", "揭阳市", "云浮市"]);
dsy.add("0_20", ["南宁市", "柳州市", "桂林市", "梧州市", "北海市", "防城港市", "钦州市", "贵港市", "玉林市", "百色市", "贺州市", "河池市", "来宾市", "崇左市"]);
dsy.add("0_21", ["海口市", "三亚市", "三沙市", "儋州市", "五指山市", "文昌市", "琼海市", "万宁市", "东方市", "定安县", "屯昌县", "澄迈县", "临高县", "琼中黎族苗族自治县", "保亭黎族苗族自治县", "白沙黎族自治县", "昌江黎族自治县", "乐东黎族自治县", "陵水黎族自治县"]);
dsy.add("0_22", ["成都市", "绵阳市", "自贡市", "攀枝花市", "泸州市", "德阳市", "广元市", "遂宁市", "内江市", "乐山市", "资阳市", "宜宾市", "南充市", "达州市", "雅安市", "广安市", "巴中市", "眉山市", "阿坝藏族羌族自治州", "甘孜藏族自治州", "凉山彝族自治州"]);
dsy.add("0_23", ["贵阳市", "六盘水市", "遵义市", "铜仁市", "毕节市", "安顺市", "黔西南布依族苗族自治州", "黔东南苗族侗族自治州", "黔南布依族苗族自治州"]);
dsy.add("0_24", ["昆明市", "曲靖市", "玉溪市", "保山市", "昭通市", "丽江市", "普洱市", "临沧市", "德宏傣族景颇族自治州", "怒江僳族自治州", "迪庆藏族自治州", "大理白族自治州", "楚雄彝族自治州", "红河哈尼族彝族自治州", "文山壮族苗族自治州", "西双版纳傣族自治州"]);
dsy.add("0_25", ["拉萨市", "日喀则市", "昌都地区", "林芝地区", "山南地区", "那曲地区", "阿里地区"]);
dsy.add("0_26", ["西安市", "宝鸡市", "咸阳市", "渭南市", "铜川市", "延安市", "榆林市", "安康市", "汉中市", "商洛市"]);
dsy.add("0_27", ["兰州市", "酒泉市", "金昌市", "天水市", "嘉峪关市", "武威市", "张掖市", "白银市", "平凉市", "庆阳市", "定西市", "陇南市", "临夏回族自治州", "甘南藏族自治州"]);
dsy.add("0_28", ["西宁市", "海东市", "海北藏族自治州", "黄南藏族自治州", "海南藏族自治州", "果洛藏族自治州", "玉树藏族自治州", "海西蒙古族藏族自治州"]);
dsy.add("0_29", ["银川市", "石嘴山市", "吴忠市", "固原市", "中卫市"]);
dsy.add("0_30", ["乌鲁木齐市", "克拉玛依市", "吐鲁番地区", "哈密地区", "阿克苏地区", "喀什地区", "和田地区", "阿勒泰地区", "塔城地区", "昌吉回族自治州", "博尔塔拉蒙古自治州", "巴音郭楞蒙古自治州", "克孜勒苏柯尔克孜自治州", "伊犁哈萨克自治州", "石河子市", "阿拉尔市", "图木舒克市", "五家渠市"]);
dsy.add("0_31", ["香港", "中西区", "东区", "南区", "湾仔区", "九龙城区", "观塘区", "深水埗区", "黄大仙区", "油尖旺区", "离岛区", "葵青区", "北区", "西贡区", "沙田区", "大埔区", "荃湾区", "屯门区", "元朗区"]);
dsy.add("0_32", ["澳门", "花地玛堂区", "圣安多尼堂区", "大堂区", "望德堂区", "风顺堂区", "嘉模堂区", "圣方济各堂区"]);
dsy.add("0_33", ["台湾", "台北市", "高雄市", "基隆市", "新竹市", "台中市", "嘉义市", "台南市", "台北县", "桃园县", "新竹县", "苗栗县", "台中县", "彰化县", "南投县", "云林县", "嘉义县", "台南县", "高雄县", "屏东县", "宜兰县", "花莲县", "台东县", "澎湖县", "金门县", "连江县"]);
var s = ["s1", "s2"];
var opt0 = ["请选择", "请选择"];
function AreasSetup(n1, n2) {
    for (i = 0; i < s.length - 1; i++)
        if (window.addEventListener) {
        document.getElementById(s[i]).addEventListener('change', Function("change(" + (i + 1) + ")"), false);
    }
    else {
        document.getElementById(s[i]).attachEvent('onchange', Function("change(" + (i + 1) + ")"));
    }
    change(0);
    document.getElementById('s1').value = n1;
    change(1);
    document.getElementById('s2').value = n2;
} 