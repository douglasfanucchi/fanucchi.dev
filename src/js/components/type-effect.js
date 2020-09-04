export default class TypeEffect {
  constructor($element, speed = 100) {
    this.$element = $element;
    this.speed = speed;
    this.words = this.$element.getAttribute('data-words').split('|');
  }

  async printWords() {
    if (!this.words) return;

    this.$element.innerHTML = '';

    await this.print();
    this.printWords();
  }

  print() {
    const word = this.words.shift();
    const letters = word.split('');

    this.words.push(word);

    return new Promise((resolve) => {
      const interval = setInterval(() => {
        if (letters.length === 0) {
          clearInterval(interval);
          setTimeout(() => resolve(), 1000);
          return;
        }

        this.$element.innerHTML += letters.shift();
      }, this.speed);
    });
  }
}
