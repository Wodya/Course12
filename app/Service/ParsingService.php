<?php
namespace App\Service;
use App\Models\Resource;
use Orchestra\Parser\Xml\Facade as XmlParser;
use Illuminate\Support\Str;

class ParsingService
{
	/**
	 * @var string
	 */
	protected $url;

	/**
	 * ParsingService constructor.
	 * @param string $url
	 */
	public function __construct(string $url)
	{
		$this->url = $url;
	}
	protected function load()
	{
		return  XmlParser::load($this->url);
	}
	/**
	 * @return array
	 */
	public function getData(): array
	{
		$load = $this->load();

		return $load->parse([
			'title'  => ['uses' => 'channel.title'],
			'link'   => ['uses' => 'channel.link'],
			'description' => ['uses' => 'channel.description'],
			'image'  => ['uses' => 'channel.image.url'],
			'news'   => ['uses' => 'channel.item[title,link,description]']
		]);
	}
	public function saveData(): void
	{
		$json = json_encode($this->getData());
		\Storage::disk('local')->put(Str::slug($this->url) . ".txt", $json);
	}
}
