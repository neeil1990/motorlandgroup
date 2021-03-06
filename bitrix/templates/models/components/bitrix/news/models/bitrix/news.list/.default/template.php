<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>

<div class="img-one">
	<img class="w-lazy delme" src="<?=CFile::GetPath($arResult['PICTURE']);?>">
	<div class="banner-text">
		<?=$arResult['DESCRIPTION']?>
	</div>
</div>

<div class="super-offer">

	<div class="spec">
		<h1 style="text-align: center; margin-bottom: 10px;"><?=$arResult['NAME']?></h1>

		<div class="super-offer-slider-giant">
			<?foreach($arResult["ITEMS"] as $arItem):?>

				<div class="super-offer-slide-giant">
					<div class="item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
						<a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
							<img data-lazy="<?=CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"], array('width'=>520, 'height'=>360), BX_RESIZE_IMAGE_EXACT, true)['src'];?>" alt="<?echo $arItem["NAME"]?>" />
						</a>
						<div class="mCarListCards_Item_Info">
							<div class="mCarListCards_Item_Info_Name">
								<a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?echo $arItem["NAME"]?></a>
							</div>
							<a class="mtr-btn mtr-btn-blue mtr-btn-wide" href="<?=$arItem["DETAIL_PAGE_URL"]?>">Подробнее</a>
						</div>
					</div>
				</div>
			<?endforeach;?>
		</div>
		<div style="clear: both"></div>



		<script>
			$(document).ready(function(){

				$('.img-one').css('height',$('.img-one img').height());

				$('.super-offer-slider-giant').slick({
					slidesToShow: 3,
					slidesToScroll: 1,
					speed: 500,
					lazyLoad: 'ondemand',
					autoplay: true,
					autoplaySpeed: 6000,
					pauseOnHover: false,
					responsive: [
						{
							breakpoint: 1430,
							settings: {
								slidesToShow: 2,
								slidesToScroll: 1,
							}
						},
						{
							breakpoint: 950,
							settings: {
								slidesToShow: 1,
								slidesToScroll: 1,
							}
						},
					]
				});

			});
		</script>

	</div>
</div>