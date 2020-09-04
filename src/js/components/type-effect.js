export default class TypeEffect {
  constructor($element, speed = 100) {
    this.$element = $element;
    this.speed = speed;
    this.words = this.$element.getAttribute('data-words').split('|');
  }

  async printWords() {
    if (!this.words) return;

    this.$element.innerHTML = '';

    const word = this.removeAndReturnFirstItemFromArray(this.words);
    this.addItemToTheEndOfTheArray(word, this.words);

    await this.printWord(word);
    this.printWords();
  }

  printWord(word) {
    const letters = word.split('');

    return new Promise((resolve) => {
      const interval = setInterval(() => {
        if (this.isArrayEmpty(letters)) return this.nextWord(resolve, interval);

        this.$element.innerHTML += this.removeAndReturnFirstItemFromArray(
          letters,
        );
      }, this.speed);
    });
  }

  removeAndReturnFirstItemFromArray(array) {
    return array.shift();
  }

  addItemToTheEndOfTheArray(word, wordsArray) {
    wordsArray.push(word);
  }

  isArrayEmpty(queue) {
    return queue.length === 0;
  }

  nextWord(resolve, interval) {
    this.clearIntervalAndCallResolve(interval, resolve);
  }

  clearIntervalAndCallResolve(interval, resolve) {
    setTimeout(() => {
      resolve();
      clearInterval(interval);
    }, 1000);
  }
}
