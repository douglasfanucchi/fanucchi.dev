import TypeEffect from './type-effect';

export default class Description {
  constructor($element) {
    this.$element = $element;
    this.$descriptionText = this.$element.querySelector('.description__text');
    this.$descriptionHighlight = this.$descriptionText.querySelector(
      '.description__highlight',
    );

    const { height: currentValue } = this.$element.getBoundingClientRect();
    this.height = { currentValue, previousValue: 0 };

    const observer = new ResizeObserver((entries) =>
      entries.forEach((entry) => {
        console.log(this.height);
        this.height.previousValue = this.height.currentValue;
        this.height.currentValue = entry.contentRect.height;
        console.log(this.height);
      }),
    );

    observer.observe(this.$element);

    this.exec();

    if (this.doesHeightChange()) {
      this.$descriptionText.insertBefore(
        document.createElement('br'),
        this.$descriptionHighlight,
      );
    }
  }

  exec() {
    let words = this.$descriptionHighlight.dataset.words.split('|');

    const biggestWord = words.reduce((biggest, word) =>
      word.length > biggest.length ? word : biggest,
    );
    this.$descriptionHighlight.innerHTML = biggestWord;

    const typeEffect = new TypeEffect(this.$descriptionHighlight, words);
  }

  doesHeightChange() {
    return true;
  }
}
