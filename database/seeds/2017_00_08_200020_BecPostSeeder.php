<?php

use Gmf\Sys\Builder;
use Illuminate\Database\Seeder;
use Suite\Bec\Models;

class BecPostSeeder extends Seeder {
	private $entId = '';

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		$this->entId = config('gmf.ent.id');

		Models\Post::where('ent_id', $this->entId)->delete();

		Models\Post::build(function (Builder $b) {
			$b->ent_id($this->entId)
				->title("车辆过户，材料你拿齐了吗？")
				->summary('一直以为，公司车辆过户，是个很简单的问题，但和很多朋友交流中，发现正确处理的并不多，再次和大家沟通一下。')
				->type_enum("news");
		});

		Models\Post::build(function (Builder $b) {
			$b->ent_id($this->entId)
				->title("《战狼2》上映势如破竹，吴京抵押房产终于有救了！")
				->summary('2015年，《战狼》的上映惊艳了很多人。作为吴京执导的首部作品，便拿下 5.45 亿的票房，成为不折不扣的黑马一匹。')
				->type_enum("news");
		});

		Models\Post::build(function (Builder $b) {
			$b->ent_id($this->entId)
				->title("基金投资如何纳税（一）？")
				->summary('尽管股票市场不温不火，基金市场却热度不减——私募基金更是让人趋之若鹜。对于基金公司及基金投资者，在基金运作过程中通常都会涉及哪些税收问题呢？')
				->type_enum("news");
		});

		Models\Post::build(function (Builder $b) {
			$b->ent_id($this->entId)
				->title("研发费用辅助账如何建？")
				->summary('工业4.0已经成为国家战略，意味着科技创新已不再是“做”和“不做”的问题，而是如何做得更好的问题')
				->type_enum("news");
		});

		Models\Post::build(function (Builder $b) {
			$b->ent_id($this->entId)
				->title("【关注两会】2017，企业减负唱主角")
				->summary('2017年3月5日上午9时，第十二届全国人民代表大会第五次会议在人民大会堂开幕，听取和审议国务院总理李克强关于政府工作的报告，审查国务院关于2016年国民经济和社会发展计划执行情况与2017年国民经济和社会发展计划草案的报告，审查国务院关于2016年中央和地方预算执行情况与2017年中央和地方预算草案的报告')
				->type_enum("news");
		});

		//knowledge
		Models\Post::build(function (Builder $b) {
			$b->ent_id($this->entId)
				->title("捐赠合同如何签订才能税前扣除？")
				->summary('对于公益性捐赠在税前扣除是有前题条件的。第一，必需经过公益性社会团体或者县以上人民政府及其部门')
				->type_enum("knowledge");
		});

		Models\Post::build(function (Builder $b) {
			$b->ent_id($this->entId)
				->title("支付给残疾人员的工资超过本年应纳税所得的，该如何处理？")
				->summary('加计扣除超过本年应纳税所得的部分所形成企业的亏损，可以结转至以后年度进行弥补。%以内的部分。另外还要有符合规定的票据')
				->type_enum("knowledge");
		});

		Models\Post::build(function (Builder $b) {
			$b->ent_id($this->entId)
				->title("母子公司间房产无偿出租，是否需要确认收入缴纳企业所得税？")
				->summary('根据《企业所得税法》的规定，企业与其关联方之间的业务往来，不符合独立交易原则而减少企业或者其关联方应纳税收入或者所得额的，税务机关有权按照合理方法调整。')
				->type_enum("knowledge");
		});

		Models\Post::build(function (Builder $b) {
			$b->ent_id($this->entId)
				->title("经营性文化事业单位改制成了股份有限公司，企业所得税有何优惠？")
				->summary('根据《财政部 国家税务总局关于文化体制改革中经营性文化事业单位转制为企业的若干税收优惠政策的通知》（财税[2009]34号）规定：自2009年1月1日至2013年12月31日：经营性文化事业单位转制为企业，自转制注册之日起免征企业所得税')
				->type_enum("knowledge");
		});

		Models\Post::build(function (Builder $b) {
			$b->ent_id($this->entId)
				->title("再就业专项补贴可否免征企业所得税？")
				->summary('根据《关于财政性资金 行政事业性收费 政府性基金有关企业所得税政策问题的通知》（财税〔2008〕151号）规定，企业取得的各类财政性资金，除属于国家投资和资金使用后要求归还本金的以外，均应计入企业当年收入总额')
				->type_enum("knowledge");
		});

		//statute
		Models\Post::build(function (Builder $b) {
			$b->ent_id($this->entId)
				->title("财政部 国家税务总局关于《中华人民共和国车辆购置税法（征求意见稿）》向社会公开征求意见的通知")
				->summary('法规文号：财政部 国家税务总局')
				->type_enum("statute");
		});

		Models\Post::build(function (Builder $b) {
			$b->ent_id($this->entId)
				->title("广东省国家税务局关于开通出口退[免]税在线申报平台的通告")
				->summary('法规文号：广东省国家税务局通告2017年第4号')
				->type_enum("statute");
		});

		Models\Post::build(function (Builder $b) {
			$b->ent_id($this->entId)
				->title("湖北省国家税务局关于调整大米农产品增值税进项税额核定扣除标准的公告")
				->summary('法规文号：湖北省国家税务局公告2017年第5号')
				->type_enum("statute");
		});

		Models\Post::build(function (Builder $b) {
			$b->ent_id($this->entId)
				->title("北京市地方税务局关于调整2017年残疾人就业保障金征期的通告")
				->summary('法规文号：北京市地方税务局通告2017年第3号')
				->type_enum("statute");
		});

		Models\Post::build(function (Builder $b) {
			$b->ent_id($this->entId)
				->title("国家税务总局关于贯彻落实《政府网站发展指引》的通知")
				->summary('法规文号：税总发〔2017〕84号')
				->type_enum("statute");
		});

	}
}
